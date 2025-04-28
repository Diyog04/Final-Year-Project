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
            ])->post('https://dev.khalti.com/api/v2/epayment/initiate/', [
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
            
            // Ensure pidx is present
            if (!isset($paymentDetails['pidx'])) {
                return redirect()->route('bookings.show')->with('error', 'Invalid payment request.');
            }
            
            // Verify payment with Khalti
            $response = Http::withHeaders([
                'Authorization' => 'key ' . env('KHALTI_SECRET_KEY'),
                'Content-Type' => 'application/json',
                ])->post('https://dev.khalti.com/api/v2/epayment/lookup/', [
                    'pidx' => $paymentDetails['pidx'],
                ]);
                
                if ($response->successful()) {
                    $verificationData = $response->json();
                    Log::info('Khalti Payment Verified:', $verificationData);
                    
                    // Optional: ensure payment is actually completed
                    if ($verificationData['status'] !== 'Completed') {
                        return redirect()->route('user.recent-bookings')->with('error', 'Payment was not completed.');
                    }
                    
                    $payment = Payment::where('pidx', $paymentDetails['pidx'])->first();
                    
                    if ($payment) {
                        $payment->update([
                            'status' => 'paid',
                            'transaction_id' => $verificationData['transaction_id'],
                        ]);
                        
                        $booking = $payment->booking;
                        
                        if ($booking) {
                            if ($booking->advance_paid < 25000) {
                                $booking->update([
                                    'advance_paid' => 25000,
                                    'status' => 'partially_paid',
                                ]);
                            } else {
                                $booking->update(['status' => 'paid']);
                            }
                            
                            return redirect()->route('bookings.success', [
                                'booking_id' => $booking->id,
                                'transaction_id' => $verificationData['transaction_id']
                            ]);
                        }
                    }
                    
                    return redirect()->route('user.recent-bookings')->with('error', 'Payment not found.');
                }
                
                Log::error('Khalti Verification Failed:', $response->json());
                return redirect()->route('user.recent-bookings')->with('error', 'Payment verification failed.');
            }
            
        }
        