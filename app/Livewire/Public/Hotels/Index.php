<?php

namespace App\Livewire\Public\Hotels;

use App\Models\Hotel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.public')]
#[Title('Hotel - Smart Tourism')]
class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 9;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $hotels = Hotel::where('is_active', true)
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.public.hotels.index', [
            'hotels' => $hotels,
        ]);
    }
}
