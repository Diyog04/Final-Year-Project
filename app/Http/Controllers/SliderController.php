<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function Slider(Request $request)
    {

        // Check if files are uploaded correctly
        $imgPath = $request->file('imageUpload')->store('slider', 'public');
        

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imgPath,
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }
}