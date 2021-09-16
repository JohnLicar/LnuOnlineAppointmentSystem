<?php

namespace App\Http\Livewire;

use App\Models\Department as ModelsDepartment;
use Livewire\Component;
use Livewire\WithPagination;

class Department extends Component
{
    use WithPagination;
    public function render()
    {

        $departments = ModelsDepartment::with([
            'vice_pres' => function ($query) {
                $query->whereRoleIs('Vice_President')->orWhereRoleIs('Department_Head')->get();
            },
        ])->Paginate(3);
        // dd($departments);
        return view('livewire.department', compact('departments'));
    }
}
