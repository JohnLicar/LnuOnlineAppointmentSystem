<?php

namespace App\Http\Livewire;

use App\Actions\LogsAction;
use App\Events\AppointmentEvent;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Service;
use App\Models\Serving;
use Livewire\Component;

class AppointmentTableForm extends Component
{
    public $servingID;
    public $clientInfo;
    public $counter_id;
    public $selectedDepartment = '';
    public $theSelectedServer = '';
    public $services = [];
    public  $toggleA = false;


    protected $rules = [
        'clientInfo.first_name' => 'required', //whatever rules you want
        'clientInfo.middle_name' => 'required', //whatever rules you want
        'clientInfo.last_name' => 'required', //whatever rules you want
        'clientInfo.email' => 'required',
        'clientInfo.contact_number' => 'required',
        'clientInfo.department_id' => 'required',
        'clientInfo.service_id' => 'required',
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
        session()->push('serving', $appointment);
        $this->clientInfo =  $appointment;
        $this->servingID = $serving;
        $this->counter_id = $counter_id;
    }

    public function updatedSelectedDepartment($department_id)
    {
        $this->services = Service::where('department_id', $department_id)->get();
    }

    public function passToNextDepartment($department_id, $service_id, LogsAction $logsAction)
    {
        $logsAction->execute($this->clientInfo, $this->counter_id, true);

        $this->clientInfo->update([
            'serving' => '0',
            'service_id' => $service_id,
            'department_id' => $department_id
        ]);
        Serving::where('id', $this->servingID)->delete();
        $this->clearData();
        session()->forget('serving');
        $this->alert('success', 'Client Successfully Passed to next Department', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'showCancelButton' => false,
            'showConfirmButton' => false
        ]);
        event(new AppointmentEvent());
    }

    public function doneAppointment(LogsAction $logsAction)
    {
        $logsAction->execute($this->clientInfo, $this->counter_id, true);
        Appointment::where('id', $this->clientInfo->id)
            ->delete();
        $this->clearData();
        session()->forget('serving');
        session()->forget('waiting');
        $this->alert('success', 'Client Successfully Passed to next Department', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'showCancelButton' => false,
            'showConfirmButton' => false
        ]);
    }

    public function failTransaction(LogsAction $logsAction)
    {
        // $logsAction->execute($this->clientInfo, $this->counter_id, false);
        // Appointment::where('id', $this->clientInfo->id)
        //     ->delete();
        // $this->clearData();
        // session()->forget('serving');
        // $this->alert('danger', 'Client Transaction nulled', [
        //     'position' => 'top-end',
        //     'timer' => 3000,
        //     'toast' => true,
        //     'showCancelButton' => false,
        //     'showConfirmButton' => false
        // ]);

        $this->clientInfo->update([
            'serving' => '0',
            'waiting' => '1'
        ]);
        Serving::where('id', $this->servingID)->delete();
        session()->forget('serving');
        session()->push('waiting', $this->clientInfo);
        $this->clearData();

        $this->alert('info', 'Client Successfully set to waiting list', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'showCancelButton' => false,
            'showConfirmButton' => false
        ]);
        event(new AppointmentEvent());
    }

    public function clearData()
    {
        $this->servingID = "";
        $this->clientInfo = "";
        $this->counter_id = "";
        $this->toggleA = false;
    }
}
