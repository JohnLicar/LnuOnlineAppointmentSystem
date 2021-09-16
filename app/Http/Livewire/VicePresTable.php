<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class VicePresTable extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $vicePresidents = User::search($this->search)
            ->with('department')
            ->whereRoleIs('Vice_President')
            ->orderByDesc('id')
            ->Paginate(3);

        return view('livewire.vice-pres-table', compact('vicePresidents'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
