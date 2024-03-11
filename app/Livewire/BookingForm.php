<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\ServiceCategory;
use App\Models\Booking;

class BookingForm extends Component
{
    public $name;
    public $description;
    public $serviceCategoryId;
    public $serviceProviderId;
    public $serviceId;
    public $date;
    public $time;
    public $scategories;
    public $sproviders;
    public $services;

    public function mount()
    {
        $this->scategories = ServiceCategory::all();
        
    }

    public function updatedServiceCategoryId($value)
    {
        $this->sproviders = ServiceProvider::where('service_category_id', $value)->get();
        $this->services = Service::where('service_category_id', $value)->get();
        
        foreach ($this->sproviders as $provider) {
            if ($provider->id !== $this->serviceProviderId) {
                $this->serviceProviderId = null;
                break; // Exit the loop early once the condition is met to avoid unnecessary iterations
            }
        }
        
        foreach ($this->services as $service) {
            if ($service->id !== $this->serviceId) {
                $this->serviceId = null;
                break; // Exit the loop early once the condition is met to avoid unnecessary iterations
            }
        }
        
    }

    public function bookService()
    {
        $validatedData = $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'serviceCategoryId' => 'required|exists:service_categories,id',
            'serviceProviderId' => 'required|exists:service_providers,id',
            'serviceId' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required',
        ]);
    
        $user_id = Auth::id();
        
        $service = Service::findOrFail($validatedData['serviceId']);
        $service_name = $service->name;

            Booking::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'service_id' => $validatedData['serviceId'],
                'service_name' => $service_name,
                'user_id' => $user_id,
                'date' => $validatedData['date'],
                'time' => $validatedData['time'],
                'service_provider_id' => $validatedData['serviceProviderId'], 
                'status' => 'Pending',
            ]);

          
        $this->reset();
    
        session()->flash('success', 'Your request has been sent to the service provider');
        
    }
    

    public function render()
    {
        return view('livewire.booking-form')->layout('layouts.base');
    }
}
