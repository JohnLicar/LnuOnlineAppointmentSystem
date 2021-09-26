<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Serving;
use Livewire\Component;

class AppointmentTableForm extends Component
{
    public $servingID;
    public $clientId;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $email;
    public $contact_number;
    public $department_id;
    public bool $toggleA = false;

    protected $listeners = [
        'ServingQueued', 'reRender' => 'render',
    ];

    public function render()
    {
        $departments = Department::all();
        return view('livewire.appointment-table-form', compact('departments'));
    }

    public function clearData()
    {
        $this->clientId = "";
        $this->first_name = "";
        $this->middle_name = "";
        $this->last_name = "";
        $this->email = "";
        $this->contact_number = "";
        $this->department_id = "";
        $this->toggleA = false;
    }

    public function ServingQueued($value)
    {
        $clientInfo =  Appointment::where('id', $value)->first();

        $this->first_name = $clientInfo->first_name;
        $this->middle_name = $clientInfo->middle_name;
        $this->last_name = $clientInfo->last_name;
        $this->email = $clientInfo->email;
        $this->contact_number = $clientInfo->contact_number;
        $this->clientId = $clientInfo->id;
        $this->servingID = $value;
    }

    public function passToNextDepartment($department_id)
    {
        Appointment::where('id', $this->clientId)
            ->update([
                'serving' => false,
                'department_id' => $department_id
            ]);

        Serving::where('appointment_id', $this->servingID)->delete();

        $this->clearData();

        session()->flash('message', 'Appointment successfully Passed to next Department!');
    }

    public function doneAppointment()
    {

        Appointment::where('id', $this->clientId)
            ->delete();
        $this->clearData();
        session()->flash('message', 'Appointment successfully done!');
    }
}
