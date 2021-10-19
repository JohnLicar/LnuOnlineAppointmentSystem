<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Service;
use DateTime;
use Livewire\Component;

class AppointmentCalendar extends Component
{

    public  $availableSlot = '';
    public function render()
    {

        $services = Service::select('description');

        return view('livewire.appointment-calendar', compact('services'));
    }

    public function availableSlot($appointmentDate)
    {
        $countPerDay = Appointment::where('scheduled_date', $appointmentDate)->count();

        return  $this->availableSlot = (100 - $countPerDay);
    }
}
