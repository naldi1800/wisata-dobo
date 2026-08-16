<?php

namespace App\Livewire\Public\Cafes;

use App\Models\Cafe;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.public')]
class Show extends Component
{
    public Cafe $cafe;

    public function mount(Cafe $cafe)
    {
        $this->cafe = $cafe;
    }

    public function render()
    {
        return view('livewire.public.cafes.show');
    }
}
