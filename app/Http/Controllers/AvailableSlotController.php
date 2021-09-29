<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AvailableSlotController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($appointmentDate)
    {
        $countPerDay = Appointment::where('scheduled_date', $appointmentDate)->count();

        $availableSlot = (100 - $countPerDay);
        return $availableSlot;
    }
}
