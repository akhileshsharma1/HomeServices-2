<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerProfileComponent extends Component
{
    public function render()
    {
        $customer = Customer::where('user_id',Auth::user()->id)->first();
        return view('livewire.customer.customer-profile-component',['customer'=>$customer])->layout('layouts.base');
    }
}
