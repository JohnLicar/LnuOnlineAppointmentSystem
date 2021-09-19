<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Serving;
use Carbon\Carbon;
use Livewire\Component;

class AppointmentTable extends Component
{

    public function render()
    {
        $appointments = Appointment::with('department')
            ->where('scheduled_date', Carbon::now()->toDateString())
            ->where('department_id', auth()->user()->department_staff->department_id)
            ->get();

        return view('livewire.appointment-table', compact('appointments'));
    }

    public function callQeueu($appointment_id)
    {
        Serving::create(['appointment_id' => $appointment_id]);
        $this->emit('updateAppointments');
    }
}
