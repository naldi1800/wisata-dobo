<?php

namespace App\Livewire\Public\Destinations;

use App\Models\Beach;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.public')]
#[Title('Destinasi Wisata - Smart Tourism')]
class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 9;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $beaches = Beach::where('is_active', true)
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.public.destinations.index', [
            'beaches' => $beaches,
        ]);
    }
}
