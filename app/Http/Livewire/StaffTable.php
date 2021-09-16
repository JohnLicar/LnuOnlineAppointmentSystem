<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class StaffTable extends Component
{

    use WithPagination;
    public $search = '';

    public function render()
    {
        $staffs = User::search($this->search)
            ->with('department')
            ->where('department_id', auth()->user()->department_id)
            ->whereRoleIs('Staff')
            ->orderByDesc('id')
            ->Paginate(3);
        return view('livewire.staff-table', compact('staffs'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
