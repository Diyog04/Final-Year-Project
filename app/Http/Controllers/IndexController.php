<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;

class IndexController extends Controller
{
    public function Index()
    {
        $products = Product::all();
        return view('user/index', compact('products'));
    }

    public function About()
    {
        return view('user/about');
    }
    public function Blog()
    {
        return view('user/blog');
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