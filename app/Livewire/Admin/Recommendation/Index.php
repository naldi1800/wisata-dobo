<?php

namespace App\Livewire\Admin\Recommendation;

use App\Services\SAW\SAWService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('SAW Recommendations')]
class Index extends Component
{
    public array $sawResult = [];
    public bool $showDetails = false;
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

    public function toggleDetails()
    {
        $this->showDetails = !$this->showDetails;
    }

    public function render()
    {
        return view('livewire.admin.recommendation.index');
    }
}
