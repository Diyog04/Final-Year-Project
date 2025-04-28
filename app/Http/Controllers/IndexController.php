<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Call;

class IndexController extends Controller
{
    public function index()
    {
        // Fetch all product records
        $products = Product::all();
    
        // Fetch all call records
        $calls = Call::all();
    
        // Fetch unique locations from the products table
        $locations = Product::pluck('location')->unique();
    
        // Pass everything to the view
        return view('user.index', compact('products', 'calls', 'locations'));
    }

    public function search(Request $request)
    {
        $query = Product::query();
    
        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }
    
        $products = $query->get(); // use 'products' instead of 'events'
        $calls = Call::all(); // add this if your view expects it
        $locations = Product::pluck('location')->unique();
    
        return view('user.index', compact('products', 'calls', 'locations'));
    }
    
    

   

    public function About()
    {
        $calls = Call::all();
        return view('user/about', compact('calls'));
    }
    public function Blog()
    {
        $calls = Call::all();
        return view('user/blog', compact('calls'));
    }

    public function Shop()
    {
        $sliders = Slider::all();
        return view('user/index', compact('sliders'));
    }
    public function Addtocart()
    {
        return view('user/addtocart');
    }

    // public function Userdash()
    // {
    //     return view('user/userdash');
    // }
}