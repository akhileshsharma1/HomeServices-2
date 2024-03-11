<?php



namespace App\Livewire\Sprovider;

use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class SproviderDashboardComponent extends Component
{
    public $bookings;

    public function mount()
    {
        $this->loadBookings();
    }

    public function acceptBooking($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->status = 'Accepted';
        $booking->save();
        $this->loadBookings(); // Refresh the bookings
    }

    public function rejectBooking($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->status = 'Rejected';
        $booking->save();
        $this->loadBookings(); // Refresh the bookings
    }

    public function loadBookings()
    {
        // Fetch the bookings based on the currently logged-in user's service provider ID
        $this->bookings = Booking::whereHas('serviceProvider', function ($query) {
            // Filter the bookings where the service provider ID matches the ID of the service provider
            // associated with the currently logged-in user
            $query->where('user_id', Auth::id());
        })->get();
    }

    public function render()
    {
        return view('livewire.sprovider.sprovider-dashboard-component')
            ->layout('layouts.base');
    }
}
