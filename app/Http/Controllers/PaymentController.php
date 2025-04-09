<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Booking;
use App\Models\Payment;



class PaymentController extends Controller
{
    /**
     * Initiate Payment with Khalti
     */
    public function initiatePayment(Request $request, $bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        
        // Check if payment already exists for this booking
        $existingPayment = Payment::where('purchase_order_id', 'order_' . $booking->id)->first();
    
        if ($existingPayment) {
            return redirect()->route('user.recent-bookings', $booking->id)->with('error', 'Payment already initiated for this booking.');
        }
    
        // Check if advance payment is required
        $amountToPay = $booking->status === 'pending' ? 25000 : ($booking->total_price - $booking->advance_paid);
        $amountInPaisa = $amountToPay * 100;  // Convert to Khalti's unit (paisa)
        
        if ($amountToPay <= 0) {
            return back()->with('error', 'No payment is required.');
        }
    
        $purchaseOrderId = 'order_' . $booking->id;
    
        // Create a payment record
        $payment = Payment::create([
            'booking_id' => $booking->id,
            'purchase_order_id' => $purchaseOrderId,
            'amount' => $amountToPay,
            'status' => 'unpaid',
            'type' => 'venue_booking',
        ]);
    
        // Send request to Khalti for payment initiation
        $response = Http::withHeaders([
            'Authorization' => 'key ' . env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://khalti.com/api/v2/epayment/initiate/', [
            'return_url' => route('payment.success.callback'),
            'website_url' => config('app.url'),
            'amount' => $amountInPaisa,
            'purchase_order_id' => $purchaseOrderId,
            'purchase_order_name' => 'Venue Booking #' . $booking->id,
        ]);
    
        if ($response->successful()) {
            $paymentData = $response->json();
    
            // Store the Khalti transaction ID
            $payment->update(['pidx' => $paymentData['pidx']]);
    
            return redirect($paymentData['payment_url']);
        } else {
            Log::error('Khalti Payment Error:', $response->json());
            return back()->with('error', 'Payment initiation failed. Please try again.');
        }
    }
    

    /**
     * Handle Payment Success Callback from Khalti
     */
    public function handlePaymentSuccess(Request $request)
    {
        $paymentDetails = $request->all();

        // Validate that the payment ID (pidx) is present in the request
        if (!isset($paymentDetails['pidx'])) {
            return redirect()->route('bookings.show')->with('error', 'Invalid payment request.');
        }

        // Call Khalti API to verify payment
        $response = Http::withHeaders([
            'Authorization' => 'key ' . env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://khalti.com/api/v2/epayment/lookup/', [
            'pidx' => $paymentDetails['pidx'],
        ]);

        // Check if the verification was successful
        if ($response->successful()) {
            $verificationData = $response->json();
            Log::info('Khalti Payment Verified:', $verificationData);

            // Find the payment record using the pidx
            $payment = Payment::where('pidx', $paymentDetails['pidx'])->first();

            if ($payment) {
                // Update the payment status to 'paid' and store the transaction ID
                $payment->update([
                    'status' => 'paid',
                    'transaction_id' => $verificationData['transaction_id'],
                ]);

                // Find the associated booking
                $booking = $payment->booking;
                if ($booking) {
                    // Update the booking status and payment details
                    if ($booking->advance_paid < 25000) {
                        $booking->update([
                            'advance_paid' => 25000,
                            'status' => 'partially_paid',
                        ]);
                    } else {
                        $booking->update(['status' => 'paid']);
                    }

                    // Redirect to booking confirmation page with payment success
                    return redirect()->route('bookings.success', [
                        'booking_id' => $booking->id,
                        'transaction_id' => $verificationData['transaction_id']
                    ]);
                }
            }

            // If payment is not found in the database
            return redirect()->route('user.recent-bookings')->with('error', 'Payment not found.');
        }

        // Log the error if the verification fails
        Log::error('Khalti Verification Failed:', $response->json());
        return redirect()->route('user.recent-bookings')->with('error', 'Payment verification failed.');
    }
}
