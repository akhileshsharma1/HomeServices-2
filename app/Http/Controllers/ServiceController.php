<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Booking;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
//     public function show(Service $service)
//     {
//         $relatedService = $service->relatedService(); // Define related service logic
//         return view('service.show', compact('service', 'relatedService'));
//     }

//     public function book(Request $request, Service $service)
//     {
//         $booking = Booking::create([
//             'service_id' => $service->id,
//             'user_id' => auth()->id(),
//             // Add more fields as needed
//         ]);
//         return redirect()->back()->with('success', 'Booking successful.'); // Redirect with success message
//     }

//     public function acceptBooking(Request $request, Service $service)
//     {
//         $bookingId = $request->input('booking_id');
//         $booking = Booking::findOrFail($bookingId);
//         // Update booking status or any other relevant actions
//         return redirect()->back()->with('success', 'Booking accepted.'); // Redirect with success message
//     }
}
