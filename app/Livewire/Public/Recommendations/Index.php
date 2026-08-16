<?php

namespace App\Livewire\Public\Recommendations;

use App\Services\SAW\SAWService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.public')]
#[Title('Rekomendasi - Smart Tourism')]
class Index extends Component
{
    public array $sawResult = [];
    public string $error = '';

    public function mount()
    {
        $this->calculateSAW();
    }

    public function calculateSAW()
    {
        try {
            $sawService = new SAWService();
            $this->sawResult = $sawService->calculate();
            $this->error = '';
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
            $this->sawResult = [];
        }
    }

    public function render()
    {
        return view('livewire.public.recommendations.index');
    }
}
