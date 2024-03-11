<?php

namespace App\Livewire\Admin;

use App\Models\Customer;
use App\Models\ServiceProvider;
use App\Models\Service;
use App\Models\User;
use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUsersComponent extends Component
{
    use WithPagination; 

    public $selectedUserType = 'all';
    public $customerCount;
    public $providerCount;
    public $serviceCount; 
    public $bookingCount;

    public function mount()
    {
        $this->customerCount = Customer::count();
        $this->providerCount = ServiceProvider::count();
        $this->serviceCount = Service::count();
        $this->bookingCount = Booking::count();
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('message', 'User has been deleted');
    }
    
    public function render()
    {
        $users = ($this->selectedUserType === 'all') 
            ? User::paginate(10)
            : User::where('utype', $this->selectedUserType)->paginate(10);

        return view('livewire.admin.admin-users-component', [
            'users' => $users,
        ])->layout('layouts.base');
    }
}
