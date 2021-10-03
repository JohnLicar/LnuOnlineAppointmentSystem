<?php

namespace App\Http\Livewire;

use App\Models\Service;
use DateTime;
use Livewire\Component;

class AppointmentCalendar extends Component
{

    public function render()
    {

        $services = Service::select('description');

        return view('livewire.appointment-calendar', compact('services'));
    }
}
