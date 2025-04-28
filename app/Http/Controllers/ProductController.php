<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\VenueImage;
use Illuminate\Support\Facades\Schema;


class ProductController extends Controller
{
    // Show product details
    public function show($id)
    {
        $product = Product::findOrFail($id);

        // Check if venue_images table exists
        $venueImages = [];
        if (Schema::hasTable('venue_images')) {
            $venueImages = $product->images; // Assuming you have relation set
        }
    
        return view('product.detail', compact('product', 'venueImages'));
    }

    // Store a new product
    public function store(Request $request)
{
    $request->validate([
        'title2' => 'required|string|max:255',
        'description2' => 'required|string',
        'imageUpload2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'contact' => 'required|string',
        'packege' => 'required|array',
        'packege.*' => 'required|string|max:255',
        'amenity' => 'required|array',
        'amenity.*' => 'required|string|max:255',
        'location' => 'required|string',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'extra_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    try {
        // Upload main image
        if (!$request->hasFile('imageUpload2')) {
            return redirect()->route('product.create')->with('error', 'Main image is required.');
        }

        $imgPath2 = $request->file('imageUpload2')->store('slider', 'public');

        $product = Product::create([
            'title2' => $request->title2,
            'description2' => $request->description2,
            'image2' => $imgPath2,
            'contact' => $request->contact,
            'packege' => json_encode($request->packege),
            'amenity' => json_encode($request->amenity),
            'location' => $request->location,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        // Extra images
        if ($request->hasFile('extra_images')) {
            foreach ($request->file('extra_images') as $image) {
                $path = $image->store('venue_gallery', 'public');

                VenueImage::create([
                    'venue_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('product.create')->with('success', 'Venue added successfully!');

    } catch (\Exception $e) {
        
        \Log::error('Venue creation failed: ' . $e->getMessage());
        return redirect()->route('product.create')->with('error', 'Failed to add venue. Please try again.');
    }
}
}