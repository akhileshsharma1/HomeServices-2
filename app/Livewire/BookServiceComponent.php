<?php

namespace App\Livewire;

use Livewire\Component;

class BookServiceComponent extends Component
{
    public function bookService()
    {
        // Logic to book the service
        // After successful booking, emit event to redirect to SVP dashboard
        $this->emit('bookingSuccessful');
    }

    public function render()
    {
        return view('livewire.book-service-component');
    }
}
