<?php

namespace App\Livewire\Admin;

use App\Models\ServiceProvider;
use Livewire\Component;

class AdminServiceProviderComponent extends Component
{

  
public function render()
{
    $sproviders = ServiceProvider::with('user')->paginate(12);
    return view('livewire.admin.admin-service-provider-component', ['sproviders' => $sproviders])->layout('layouts.base');   
 }
}

