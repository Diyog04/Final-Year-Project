<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function Product(Request $request)
{
    if ($request->hasFile('imageUpload2')) {
        $imgPath2 = $request->file('imageUpload2')->store('slider', 'public');
    } else {
        return back()->with('error', 'No file uploaded');
    }

    Product::create([
        'title2' => $request->title2,
        'description2' => $request->description2,
        'image2' => $imgPath2,
    ]);

    return redirect()->route('product.create')->with('success', 'Venue added successfully!');
}

public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.detail', compact('product'));
    }

}