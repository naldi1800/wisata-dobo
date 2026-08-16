<?php

namespace App\Livewire\Public\Hotels;

use App\Models\Hotel;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.public')]
class Show extends Component
{
    public Hotel $hotel;

    public function mount(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }

    public function render()
    {
        return view('livewire.public.hotels.show');
    }
}
