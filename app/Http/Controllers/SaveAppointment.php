<?php

namespace App\Http\Controllers;

use App\Actions\StoreAppointmentAction;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaveAppointment extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, StoreAppointmentAction $storeAppointmentAction)
    {
        $appointment = $storeAppointmentAction->execute($request);
        return redirect()->route('welcome')->with('message', 'Appointment Success! Your Queuing Number is ' . $appointment->queuing_number);
    }
}
