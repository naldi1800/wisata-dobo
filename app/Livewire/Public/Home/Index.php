<?php

namespace App\Livewire\Public\Home;

use App\Models\Beach;
use App\Services\SAW\SAWService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.public')]
#[Title('Smart Tourism - Kabupaten Kepulauan Aru')]
class Index extends Component
{
    public array $featuredBeaches = [];
    public array $topRecommendations = [];

    public function mount()
    {
        $this->loadFeaturedBeaches();
        $this->loadTopRecommendations();
    }

    private function loadFeaturedBeaches()
    {
        $this->featuredBeaches = Beach::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get()
            ->toArray();
    }

    private function loadTopRecommendations()
    {
        try {
            $sawService = new SAWService();
            $result = $sawService->calculate();
            $this->topRecommendations = array_slice($result['ranking'], 0, 3);
        } catch (\Exception $e) {
            $this->topRecommendations = [];
        }
    }

    public function render()
    {
        return view('livewire.public.home.index');
    }
}
