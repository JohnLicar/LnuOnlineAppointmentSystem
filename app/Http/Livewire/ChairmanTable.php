<?php

namespace App\Http\Livewire;

use App\Models\Department;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ChairmanTable extends Component
{

    use WithPagination;
    public $search = '';

    public function render()
    {
        $chairs = Department::where('vp_id', '!=', auth()->user()->id)
            ->whereNotNull('chairman_id')
            ->get('chairman_id');
        $chairmans = User::search($this->search)
            ->with('chairman')
            ->whereRoleIs('Department_Head')
            ->whereNotIn('id', $chairs)
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
