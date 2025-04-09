<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function User(){
        return view('user/user');
    }

    public function showRecentBookings()
    {
        // Get the bookings for the currently authenticated user
        $bookings = Booking::where('customer_id', Auth::id())->latest()->get();

        // Return the view and pass the bookings
        return view('user.recent-bookings', compact('bookings'));
    }


}
