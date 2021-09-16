<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Department;
use App\Models\Service;
use Livewire\Component;

class AppointmentForm extends Component
{
    public function render()
    {

        $departments = Department::all();
        return view('livewire.appointment-form', compact('departments'));
    }
}
