<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ChairmanTable extends Component
{

    use WithPagination;
    public $search = '';

    public function render()
    {

        $chairmans = User::search($this->search)
            ->with('chairman')
            ->whereRoleIs('Department_Head')
            ->orderByDesc('id')
            ->Paginate(3);

        // dd($chairmans[0]->chairman);
        return view('livewire.chairman-table', compact('chairmans'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
