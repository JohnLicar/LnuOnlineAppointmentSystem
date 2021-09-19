<?php

namespace App\Actions;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\Service;
use App\Notifications\AppointmentNotification;
use Carbon\Carbon;

class StoreAppointmentAction
{
    public function execute(Request $request)
    {
        $transactionCode = Department::select('code')
            ->where('id', $request->department_id)->first();

        $autoTN = Appointment::select('queuing_number')
            ->where('department_id', $request->department_id)
            ->orderBy('id', 'desc')
            ->first();

        if (!$autoTN || $autoTN === null) {
            $queuingNumber = $transactionCode->code . -1;
            $request->request->add(['queuing_number' => $queuingNumber]);
        } else {
            $queue = explode('-', $autoTN->queuing_number);
            $queuingNumber = $transactionCode->code . "-" . ($queue[1] + 1);
            $request->request->add(['queuing_number' => $queuingNumber]);
        }


        $validated = $request->validate([
            // 'studentID' => ['required', 'min:6'],
            'queuing_number' => ['required'],
            'department_id' => ['required'],
            'scheduled_date' => ['required', 'date', 'min:3'],
            'first_name' => ['required', 'min:2'],
            'middle_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'email' => ['required', 'email', 'min:6'],
            'contact_number' => ['required', 'min:3'],

        ]);
        // dd($validated);

        $date = Carbon::parse($request->appointmentDate, 'UTC');
        $date->isoFormat('MMM Do YY');

        $clientData = [
            'body' => 'Hello ' . $request->name . ' Welcome to MIS Queuing System!
                Your Queuing Number is ' . $queuingNumber . ' and will be Valid only on ' . $date,
            'thankyou' => 'Thank you for using LNU Queuing System',
        ];

        $appointment = Appointment::create($validated);

        $appointment->notify((new AppointmentNotification($clientData)));

        return $appointment;
    }
}
