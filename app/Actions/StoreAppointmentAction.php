<?php

namespace App\Actions;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Service;
use App\Notifications\AppointmentNotification;
use Carbon\Carbon;

class StoreAppointmentAction
{
    public function execute(Request $request)
    {
        $transactionCode = Service::select('code')
            ->where('id', $request->service_id)->first();

        $autoTN = Appointment::select('queuing_number')
            ->where('scheduled_date', $request->scheduled_date)
            ->where('service_id', $request->service_id)
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
            'queuing_number' => ['required'],
            'department_id' => ['required'],
            'service_id' => ['required'],
            'scheduled_date' => ['required', 'date', 'min:3'],
            'first_name' => ['required', 'min:2'],
            'middle_name' => ['required', 'min:2'],
            'last_name' => ['required', 'min:2'],
            'email' => ['required', 'email', 'min:6'],
            'contact_number' => ['required', 'min:3'],

        ]);

        $date = Carbon::parse($request->appointmentDate)->format('d M Y');

        $clientData = [
            'body' => 'Hello <strong>' . $request->first_name . ' ' . $request->last_name . '</strong> Welcome to MIS Queuing System!
                Your Queuing Number is <strong>' . $queuingNumber . '</strong> and will be Valid only on <strong>' . $date . '</strong>',
            'thankyou' => 'Thank you for using LNU Queuing System',
        ];

        $appointment = Appointment::create($validated);

        $appointment->notify((new AppointmentNotification($clientData)));

        return $appointment;
    }
}
