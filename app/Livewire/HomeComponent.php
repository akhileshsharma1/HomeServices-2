<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Service;

class HomeComponent extends Component
{
    public function render()
    {
        $scategories = ServiceCategory::inRandomOrder()->take(18)->get();
        $fservices = Service::where('featured',1)->inRandomOrder()->take(18)->get();
        return view('livewire.home-component',['scategories'=>$scategories,'fservices'=>$fservices])->layout('layouts.base');
    }
}
