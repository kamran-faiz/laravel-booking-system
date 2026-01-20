<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;

class BookingController extends Controller
{
    public function dashboard()
    {
        $providers = User::where('role', 'provider')->get();

        return view('booking.create', [
            'providers' => $providers
        ]);
    }

   
    public function store(Request $request)
    {
     
        $request->validate([
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'provider_id'  => 'required|exists:users,id',
        ]);

       
        $booking = new Booking();

       
        $booking->user_id = auth()->id();

        
        $booking->provider_id = $request->provider_id;

    
        $booking->booking_date = $request->booking_date;
        $booking->booking_time = $request->booking_time;

        
        $booking->status = 'pending';

        
        $booking->save();

        return redirect()->back()->with('success', 'Booking created successfully!');
    }

   
    public function bookings()
    {
        $bookings = Booking::where('user_id', auth()->id())->get();

        return view('booking.bookings', [
            'bookings' => $bookings
        ]);
    }
}
