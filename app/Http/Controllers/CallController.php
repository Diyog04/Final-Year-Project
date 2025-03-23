<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Call;

class CallController extends Controller
{
    public function Call(Request $request)
    {
        

        Call::create([
            'title1' => $request->title1,
            'description1' => $request->description1,
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }
}