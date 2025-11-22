<?php

namespace App\Livewire\Customer;

use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class CustomerDashboardComponent extends Component
{
    public $bookings;
    public $declaration;
    public function mount()
    {
        $user_id = Auth::id();
        $this->bookings = Booking::where('user_id', $user_id)->get();
    }

    public function render()
    {
        return view('livewire.customer.customer-dashboard-component')->layout('layouts.base');
    }
}
