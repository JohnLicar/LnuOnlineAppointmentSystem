<?php

namespace App\Actions;

use App\Models\Appointment;
use App\Models\Logs;

class LogsAction
{
    public function execute(Appointment $appointment, $counter_id, $status)
    {

        $log = [
            'first_name' => $appointment->first_name,
            'middle_name'  => $appointment->middle_name,
            'last_name' => $appointment->last_name,
            'department_id' =>  auth()->user()->department_staff->department_id,
            'staff_id' => auth()->user()->id,
            'counter_id' => $counter_id,
            'status' => $status
        ];

        $logs =  Logs::create($log);
    }
}
