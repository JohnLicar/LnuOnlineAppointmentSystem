<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Department;
use App\Models\Service;
use Livewire\Component;

class AppointmentForm extends Component
{
    public $selectedDepartment = '';
    public $selectedService = '';
    public $services = [];

    public function render()
    {
        return view(
            'livewire.appointment-form',
            [
                'departments' => Department::all()
            ],
        );
    }

    public function updatedSelectedDepartment($department_id)
    {
        $this->services = Service::where('department_id', $department_id)->get();
    }
}
