<?php

namespace App\Livewire\Public\Cafes;

use App\Models\Cafe;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.public')]
#[Title('Cafe - Smart Tourism')]
class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 9;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $cafes = Cafe::where('is_active', true)
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.public.cafes.index', [
            'cafes' => $cafes,
        ]);
    }
}
