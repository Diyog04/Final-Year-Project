<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Show product details
    public function show($id)
    {
        // Fetch the product
        $product = Product::findOrFail($id);

        // Pass the product to the view
        return view('product.detail', compact('product'));
    }

    // Store a new product
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title2' => 'required|string|max:255',
            'description2' => 'required|string',
            'imageUpload2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
            'contact' => 'required|string',
            'packege' => 'required|string',
        ]);

        // Handle file upload
        if ($request->hasFile('imageUpload2')) {
            $imgPath2 = $request->file('imageUpload2')->store('slider', 'public');
        } else {
            return back()->with('error', 'No file uploaded');
        }

        // Create the product
        Product::create([
            'title2' => $request->title2,
            'description2' => $request->description2,
            'image2' => $imgPath2,
            'contact' => $request->contact,
            'packege' => $request->packege,
        ]);

        // Redirect with success message
        return redirect()->route('product.create')->with('success', 'Venue added successfully!');
    }
}