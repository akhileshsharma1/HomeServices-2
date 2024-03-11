<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Customer;
use App\Models\ServiceProvider;
use App\Models\Service;
use App\Models\User;
use Livewire\WithPagination;

class AdminDashboardComponent extends Component
{
    use WithPagination;

    public $customerCount;
    public $providerCount;
    public $serviceCount;

    public function mount()
    {
        // Count the number of customers
        $this->customerCount = Customer::count();

        // Count the number of service providers
        $this->providerCount = ServiceProvider::count();

        // Count the number of services
        $this->serviceCount = Service::count();
    }

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.admin.admin-dashboard-component', ["users" => $users])->layout('layouts.base');
    }
}
