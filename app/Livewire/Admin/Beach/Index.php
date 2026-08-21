<?php

namespace App\Livewire\Admin\Beach;

use App\Models\Beach;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Beach Management')]
class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 10;

    protected $paginationTheme = 'tailwind';

    public function delete($id)
    {
        $beach = Beach::findOrFail($id);
        $beach->delete();
        
        $this->dispatch('toast', 'Beach deleted successfully', 'success');
    }

    public function restore($id)
    {
        $beach = Beach::withTrashed()->findOrFail($id);
        $beach->restore();
        
        $this->dispatch('toast', 'Beach restored successfully', 'success');
    }

    public function forceDelete($id)
    {
        $beach = Beach::withTrashed()->findOrFail($id);
        $beach->forceDelete();
        
        $this->dispatch('toast', 'Beach permanently deleted', 'success');
    }

    public function toggleActive($id)
    {
        $beach = Beach::withTrashed()->findOrFail($id);
        $beach->is_active = !$beach->is_active;
        $beach->save();
        
        $this->dispatch('toast', 'Beach status updated', 'success');
    }

    public function render()
    {
        $beaches = Beach::withTrashed()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin.beach.index', [
            'beaches' => $beaches,
        ]);
    }
}
