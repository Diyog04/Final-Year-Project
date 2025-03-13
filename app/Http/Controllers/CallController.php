<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Call;

class CallController extends Controller
{
    public function Call(Request $request)
    {

        // Check if files are uploaded correctly
        $imgPath1 = $request->file('imageUpload1')->store('slider', 'public');
        

        Call::create([
            'title1' => $request->title1,
            'description1' => $request->description1,
            'image1' => $imgPath1,
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }
}