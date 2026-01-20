<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class ProviderController extends Controller
{
    public function dashboard(){
        $bookings = Booking::where('provider_id', auth()->id())->get();
        return view ('provider.dashboard', ['bookings' => $bookings]);

    }
    public function status(Request $request, $id)
{
    
    $request->validate([
        'status' => 'required|in:accepted,rejected',
    ]);

 
    $booking = Booking::findOrFail($id);

    
    if ($booking->provider_id !== auth()->id()) {
        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    
    $booking->status = $request->status;
    $booking->save();

    
    return redirect('/provider/dashboard')
        ->with('success', 'Booking status updated successfully.');
}
}