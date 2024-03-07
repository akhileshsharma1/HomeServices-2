<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminEditUserComponent extends Component
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $utype;
    
    public function mount($id){
        $user = User::find($id);
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        // $this->password = $user->password;
        $this->utype = $user->utype;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required',
            // 'password' => 'required',
            'utype' => 'required',
        ]);
    
}
public function updateServiceCategory(){
    $this->validate([
        'name' => 'required',
        'email' => 'required',
        // 'password' => 'required',
        'utype' => 'required',
    ]);

    $user = User::find($this->id);
    $user->name = $this->name;
    $user->email = $this->email;
    // $user->password = $this->password;
    $user->utype = $this->utype;    
    $user->save();
    session()->flash('message','Category has been updated successfully');
}


    public function render()
    {
        return view('livewire.admin.admin-edit-user-component')->layout('layouts.base');
    }
}
