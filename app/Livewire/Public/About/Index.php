<?php

namespace App\Livewire\Public\About;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.public')]
#[Title('Tentang - Smart Tourism')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.public.about.index');
    }
}
