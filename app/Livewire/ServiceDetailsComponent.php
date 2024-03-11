<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;


class ServiceDetailsComponent extends Component
{
    public $service_slug;

    public function mount($service_slug)
    {
        $this->service_slug = $service_slug;
    }

    public function render()
    {
        // Retrieve the service based on the slug
        $service = Service::where('slug', $this->service_slug)->first();

        // If service not found, handle appropriately, for example:
        if (!$service) {
            abort(404); // Show a 404 page or handle it in any way you want
        }

        // Retrieve a related random service based on the category
        $r_service = Service::where('service_category_id', $service->service_category_id)
                            ->where('slug', '!=', $this->service_slug)
                            ->inRandomOrder()
                            ->first();

        

        return view('livewire.service-details-component', ['service' => $service, 'r_service' => $r_service])
            ->layout('layouts.base');
    }
        // public function showBookingForm()
        //                         {
        //                             if (Auth::check()) {
        //                                 return view('livewire.booking-form')->layout('layouts.base');
        //                                                         } else {
        //                                 return redirect()->route('login')->with('error', 'Please log in to continue booking.');
        //                             }
        //                         }
    //     public function showBookingForm()
    // {
    //     if (Auth::check()) {
    //         return redirect()->route('booking.form'); // Assuming 'booking.form' is the route name for your booking form
    //     } else {
    //         return redirect()->route('login')->with('error', 'Please log in to continue booking.');
    //     }
    // }
}
