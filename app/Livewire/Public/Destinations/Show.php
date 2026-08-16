<?php

namespace App\Livewire\Public\Destinations;

use App\Models\Beach;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.public')]
class Show extends Component
{
    public Beach $beach;

    public function mount(Beach $beach)
    {
        $this->beach = $beach;
    }

    public function render()
    {
        return view('livewire.public.destinations.show');
    }
}
