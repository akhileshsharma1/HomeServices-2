<?php

namespace App\Livewire\Customer;

use Livewire\Component;

use App\Models\Customer;
// use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class EditCustomerProfile extends Component
{
    use WithFileUploads;

    public $service_provider_id;
    // public $phoneno;
    public $image;
    public $about;
    public $city;
    // public $service_category_id;
    // public $service_locations;
    public $newimage;

    public function mount()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        if ($customer) {
            $this->customer_id = $customer->id;
            $this->image = $customer->image;
            // $this->phoneno = $customer->phoneno;
            $this->about = $customer->about;
            $this->city = $customer->city;
            // $this->service_category_id = $customer->service_category_id;
            // $this->service_locations = $customer->service_locations;
        }
    }

    public function updateProfile1()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
          if($customer){
              if ($this->newimage) {
                $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
                $this->newimage->storeAs('customer', $imageName);
                $customer->image = $imageName;
            }

            $customer->about = $this->about;
            $customer->city = $this->city;
            // $customer->phoneno = $this->phoneno;
            // $customer->service_category_id = $this->service_category_id;
            // $customer->service_locations = $this->service_locations;
            $customer->save();
            session()->flash('message', 'Profile has been updated successfully');
          }else {
            dd("Customer not found for user ID: " . Auth::user()->id);
        }
    }
    

    public function render()
    {
        return view('livewire.customer.edit-customer-profile')->layout('layouts.base');
    }
}