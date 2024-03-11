<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Booking;
use Livewire\withPagination;
use Illuminate\Pagination\Paginator;

class AdminBookingsComponent extends Component
{
    use withPagination;

    public function deleteBookings($id){
        $bookings = Booking::find($id);
        
        $bookings->delete();
        session()->flash('message','Service Category has been deleted successfully!');
    }

    public function render()
    {
        $bookings = Booking::paginate(10);
        return view('livewire.admin.admin-bookings-component',['bookings'=>$bookings])->layout('layouts.base');
    }
}
