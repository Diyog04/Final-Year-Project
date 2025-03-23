<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Booking;
use App\Models\Product;

class PaymentController extends Controller
{
    // Initiate payment with Khalti
    public function initiatePayment(Request $request, $productId)
    {
        // Fetch the product
        $product = Product::findOrFail($productId);

        // Create or fetch the booking for the product
        $booking = Booking::firstOrCreate(
            ['product_id' => $productId],
            ['total_price' => 25000, 'status' => 'pending'] // Default values
        );

        // Convert amount to paisa (Khalti requires amount in paisa)
        $amount = $booking->total_price * 100;

        // Call Khalti API to initiate payment
        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://a.khalti.com/api/v2/epayment/initiate/', [
            'return_url' => route('payment.success'), // Redirect URL after payment
            'website_url' => config('app.url'), // Your website URL
            'amount' => $amount, // Amount in paisa
            'purchase_order_id' => 'order_' . $booking->id, // Unique order ID
            'purchase_order_name' => 'Venue Booking #' . $booking->id, // Order name
        ]);

        if ($response->successful()) {
            $paymentData = $response->json();
            return redirect($paymentData['payment_url']); // Redirect to Khalti payment page
        } else {
            return back()->with('error', 'Payment initiation failed. Please try again.');
        }
    }

    // Handle payment success callback
    public function handlePaymentSuccess(Request $request)
    {
        $paymentDetails = $request->all();

        // Verify payment using Khalti's API
        $response = Http::withHeaders([
            'Authorization' => 'Key ' . env('KHALTI_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://a.khalti.com/api/v2/epayment/lookup/', [
            'pidx' => $paymentDetails['pidx'], // Payment ID from Khalti
        ]);

        if ($response->successful()) {
            $verificationData = $response->json();

            // Update the booking status to 'paid'
            $bookingId = str_replace('order_', '', $verificationData['purchase_order_id']);
            $booking = Booking::find($bookingId);

            if ($booking) {
                $booking->update(['status' => 'paid']);
            }

            // Redirect to a success page
            return redirect()->route('bookings.show')->with('success', 'Payment successful!');
        } else {
            // Redirect to an error page
            return redirect()->route('booking.show')->with('error', 'Payment verification failed.');
        }
    }
}