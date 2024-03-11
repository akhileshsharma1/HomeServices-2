<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\LocationComponent; 

class ChangeLocationComponent extends Component
{
    public $street;
    public $city;
    public $country;
    public $longitude;
    public $latitude;

    public function changeLocation()
    {
        session()->put('street', $this->street);
        session()->put('city', $this->city);
        session()->put('country', $this->country);
        session()->put('longitude', $this->longitude);
        session()->put('latitude', $this->latitude);
        session()->flash('message', 'Location has been changed');
        $this->emitTo(LocationComponent::class, 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.change-location-component')->layout('layouts.base');
    }
}
