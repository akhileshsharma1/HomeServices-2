<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\withPagination;
use Illuminate\Pagination\Paginator;
use App\Models\Service;

class AdminServicesComponent extends Component
{
    use withPagination;

    public function deleteService($service_id){
        $service = Service::find($service_id);
        if($service->thumbnail){
            unlink('assets/images/services/thumbnails'. '/' .$service->thumbnail);
        }
        if($service->image){
            unlink('assets/images/services'. '/' .$service->thumbnail);
        }
        $service->delete();
        session()->flash('message','Service has been deleted successfully!');
    }

    public function render()
    {
        $services = Service::paginate(10);
        return view('livewire.admin.admin-services-component',['services'=>$services])->layout('layouts.base');
    }
}
