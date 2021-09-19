<?php

namespace App\Http\Livewire;

use App\Models\Department as ModelsDepartment;
use Livewire\Component;
use Livewire\WithPagination;

class Department extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {

        $departments = ModelsDepartment::search($this->search)->with(['vice_pres', 'chairman'])->Paginate(3);
        // dd($departments);
        return view('livewire.department', compact('departments'));
    }
}
