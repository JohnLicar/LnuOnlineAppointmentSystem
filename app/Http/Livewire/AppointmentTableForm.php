<?php

namespace App\Http\Livewire;

use App\Actions\LogsAction;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Serving;
use Livewire\Component;

class AppointmentTableForm extends Component
{
    public $servingID;
    public $clientInfo;
    public $counter_id;
    public bool $toggleA = false;


    protected $rules = [
        'clientInfo.first_name' => 'required', //whatever rules you want
        'clientInfo.middle_name' => 'required', //whatever rules you want
        'clientInfo.last_name' => 'required', //whatever rules you want
        'clientInfo.email' => 'required',
        'clientInfo.contact_number' => 'required',
        'clientInfo.department_id' => 'required',
    ];

    protected $listeners = [
        'ServingQueued', 'reRender' => 'render',
    ];

    public function render()
    {
        $departments = Department::all();
        return view('livewire.appointment-table-form', compact('departments'));
    }

    public function ServingQueued(Appointment $appointment, $serving, $counter_id)
    {
        $this->clientInfo =  $appointment;
        $this->servingID = $serving;
        $this->counter_id = $counter_id;
    }

    public function passToNextDepartment($department_id, LogsAction $logsAction)
    {

        $logsAction->execute($this->clientInfo, $this->counter_id);

        $this->clientInfo->update([
            'serving' => '0',
            'department_id' => $department_id
        ]);
        Serving::where('id', $this->servingID)->delete();
        $this->clearData();

        $this->alert('success', 'Client Successfully Passed to next Department', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'showCancelButton' => false,
            'showConfirmButton' => false
        ]);
    }

    public function doneAppointment(LogsAction $logsAction)
    {
        $logsAction->execute($this->clientInfo, $this->counter_id);

        Appointment::where('id', $this->clientInfo->id)
            ->delete();
        $this->clearData();
        $this->alert('success', 'Client Successfully Passed to next Department', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'showCancelButton' => false,
            'showConfirmButton' => false
        ]);
    }

    public function clearData()
    {
        $this->servingID = "";
        $this->clientInfo = "";
        $this->counter_id = "";
        $this->toggleA = false;
    }
}
