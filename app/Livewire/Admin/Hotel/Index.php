<?php

namespace App\Livewire\Admin\Hotel;

use App\Models\Hotel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Hotel Management')]
class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 10;

    protected $paginationTheme = 'tailwind';

    public function delete($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        
        $this->dispatch('toast', 'Hotel deleted successfully', 'success');
    }

    public function restore($id)
    {
        $hotel = Hotel::withTrashed()->findOrFail($id);
        $hotel->restore();
        
        $this->dispatch('toast', 'Hotel restored successfully', 'success');
    }

    public function toggleActive($id)
    {
        $hotel = Hotel::withTrashed()->findOrFail($id);
        $hotel->is_active = !$hotel->is_active;
        $hotel->save();
        
        $this->dispatch('toast', 'Hotel status updated', 'success');
    }

    public function render()
    {
        $hotels = Hotel::withTrashed()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin.hotel.index', [
            'hotels' => $hotels,
        ]);
    }
}
