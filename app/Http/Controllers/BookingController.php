<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Booking;
use App\Models\user;

class BookingController extends Controller
{
   
        public function create(Request $request)

        {

            // Fetch the product_id from the query parameter
            $productId = $request->query('product_id');
    
            // Fetch the product details (if needed)
            $product = Product::find($productId);
    
            // Fetch all products to display in the form (if needed)
            $products = Product::all();
    
            // Pass the variables to the view
            return view('user.booking', [
                'productId' => $productId,
                'product' => $product,
                'products' => $products,
            ]);
        }

        
   

    // Handle form submission
    public function store(Request $request)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to make a booking.');
        }
    
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'booking_date' => 'required|date',
            'total_price' => 'required|numeric|min:0',
        ]);
    
        try {

            // Create a new booking
            Booking::create([
                'product_id' => $request->product_id,
                'customer_id' => auth()->user()->id,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'total_price' => $request->total_price,
                'status' => 'pending', // Default status
                'booking_date' => $request->booking_date,
                'payment_id' => null, // Payment ID will be updated after payment
            ]);
    
            // Redirect to a success page or payment gateway
            return redirect()->route('bookings.success')->with('message', 'Booking is awaiting payment confirmation!');
            
        } catch (\Exception $e) {
            // If there is an error during the creation process
            return redirect()->back()->with('error', 'There was an error creating the booking: ' . $e->getMessage());
        }
    }
    

    // Show success page
    public function success()
    {
        return view('user.success');
    }
}
