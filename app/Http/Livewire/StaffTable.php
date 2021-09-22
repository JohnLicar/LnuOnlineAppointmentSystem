<?php

namespace App\Http\Livewire;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;

class StaffTable extends Component
{

    use WithPagination;
    public $search = '';

    public function render()
    {
        $staffs = Staff::search($this->search)
            ->with(['staff', 'department'])
            ->when(auth()->user()->chairman !== null, function ($query) {
                $query->where('department_id', auth()->user()->chairman->id);
            })
            ->orderByDesc('id')
            ->Paginate(3);
        return view('livewire.staff-table', compact('staffs'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
