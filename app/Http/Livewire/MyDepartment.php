<?php

namespace App\Http\Livewire;

use App\Models\Department as ModelsDepartment;
use Livewire\Component;
use Livewire\WithPagination;


class MyDepartment extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $departments = ModelsDepartment::search($this->search)->with('chairman')->where('vp_id', auth()->user()->id)->Paginate(3);
        // dd($departments);
        return view('livewire.my-department', compact('departments'));
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }
}
