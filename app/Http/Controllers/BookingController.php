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
        // Validate the request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Create a new booking
        Booking::create([
            'product_id' => $request->product_id,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'total_price' => $request->total_price,
            'status' => 'pending', // Default status
            'payment_id' => null, // Payment ID will be updated after payment
        ]);

        // Redirect to a success page or payment gateway
        return redirect()->route('bookings.success')->with('message', 'Booking created successfully!');
    }

    // Show success page
    public function success()
    {
        return view('user.success');
    }
}
