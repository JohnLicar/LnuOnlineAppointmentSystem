<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Events\ServingDisplay;
use App\Models\Counter;
use App\Models\Serving;
use Carbon\Carbon;
use Livewire\Component;

class AppointmentTable extends Component
{

    public function mount()
    {
        $this->counters = Counter::with('department')
            ->where('department_id', auth()->user()->department_staff->department_id)
            ->get();
    }


    public function render()
    {
        $appointments = Appointment::with('department')
            ->where('scheduled_date', Carbon::now()->toDateString())
            ->where('department_id', auth()->user()->department_staff->department_id)
            ->get();

        return view('livewire.appointment-table', compact('appointments'));
    }

    public function callQueue($appointment_id, $counter_id)
    {
        // dd($appointment_id, $counter_id);
        event(new ServingDisplay());
        Serving::create([
            'appointment_id' => $appointment_id,
            'counter_id' => $counter_id,
        ]);
    }
}
