<?php

namespace App\Livewire\Sprovider;

use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;


class SproviderDashboardComponent extends Component
{
    public $bookings;
    public $declaration = [];
    public $declarationSent = false;

    public function mount()
    {
        $this->loadBookings();
    }

    public function acceptBooking($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->status = 'Accepted';
        $booking->save();
        $this->loadBookings(); 
    }

    public function rejectBooking($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $booking->status = 'Rejected';
        $booking->save();
        $this->loadBookings(); 
    }

    public function loadBookings()
    {
        $this->bookings = Booking::whereHas('serviceProvider', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();
    }

    public function sendDescription($bookingId)
    {
        $booking = Booking::find($bookingId);
        if ($booking) {
            if (!isset($this->declaration[$bookingId])) {
                $this->declaration[$bookingId] = '';
            }
            $booking->declaration = $this->declaration[$bookingId];
            $booking->save();
            $this->declaration[$bookingId] = '';
            $this->declarationSent = true;
        } else {
            session()->flash('error', 'Booking not found!');
        }
    }

    public function updateDeclaration($bookingId)
    {
        $booking = Booking::find($bookingId);
        if ($booking) {
            if (!isset($this->declaration[$bookingId])) {
                $this->declaration[$bookingId] = '';
            }
            $booking->declaration = $this->declaration[$bookingId];
            $booking->save();
            $this->declaration[$bookingId] = '';
            session()->flash('message', 'Declaration updated successfully!');
        } else {
            session()->flash('error', 'Booking not found!');
        }
    }

    public function render()
    {
        return view('livewire.sprovider.sprovider-dashboard-component')
            ->layout('layouts.base');
    }
}
