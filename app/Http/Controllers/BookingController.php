<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function bookService(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required',
            // Add more validation rules as needed
        ]);

        // Automatically set the user ID of the authenticated user
        $user_id = Auth::id();

        // Create a new booking
        $booking = new Booking();
        $booking->service_id = $validatedData['service_id'];
        $booking->service_name = Service::findOrFail($validatedData['service_id'])->name; // Get service name by ID
        $booking->user_id = $user_id;
        $booking->date = $validatedData['date'];
        $booking->time = $validatedData['time'];
        // Add more fields as needed
        $booking->save();

        // Redirect or respond with a success message
        return redirect()->route('booking.form')->with('success', 'Booking successful!');
    }
}
