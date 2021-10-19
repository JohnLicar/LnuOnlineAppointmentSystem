<?php

namespace App\Http\Livewire;

use App\Models\Department;
use Livewire\Component;

class MyDepartmentShow extends Component
{
    public $department;
    public function mount($department)
    {
        $this->department = Department::with(['staff.staff', 'chairman'])->find($department);
        // dd($this->department);
    }

    public function render()
    {
        return view('livewire.my-department-show');
    }
}
