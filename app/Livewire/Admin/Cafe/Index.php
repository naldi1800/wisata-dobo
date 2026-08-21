<?php

namespace App\Livewire\Admin\Cafe;

use App\Models\Cafe;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Cafe Management')]
class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 10;

    protected $paginationTheme = 'tailwind';

    public function delete($id)
    {
        $cafe = Cafe::findOrFail($id);
        $cafe->delete();
        
        $this->dispatch('toast', 'Cafe deleted successfully', 'success');
    }

    public function restore($id)
    {
        $cafe = Cafe::withTrashed()->findOrFail($id);
        $cafe->restore();
        
        $this->dispatch('toast', 'Cafe restored successfully', 'success');
    }

    public function forceDelete($id)
    {
        $cafe = Cafe::withTrashed()->findOrFail($id);
        $cafe->forceDelete();
        
        $this->dispatch('toast', 'Cafe permanently deleted', 'success');
    }

    public function toggleActive($id)
    {
        $cafe = Cafe::withTrashed()->findOrFail($id);
        $cafe->is_active = !$cafe->is_active;
        $cafe->save();
        
        $this->dispatch('toast', 'Cafe status updated', 'success');
    }

    public function render()
    {
        $cafes = Cafe::withTrashed()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin.cafe.index', [
            'cafes' => $cafes,
        ]);
    }
}
