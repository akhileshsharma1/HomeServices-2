<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.admin.admin-dashboard-component',["users"=>$users])->layout('layouts.base');
    }
}
