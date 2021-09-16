<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Service;
use Carbon\Carbon;
use Livewire\Component;

class AppointmentTable extends Component
{
    public function render()
    {

        $services =  Service::select('id')->where('department_id', auth()->user()->department_id)
            ->get();

        $appointments = Appointment::with(['course', 'service'])
            ->where('scheduled_date', Carbon::now()->toDateString())
            ->whereIn('service_id', $services)
            ->get();

        // dd($appointments);
        return view('livewire.appointment-table', compact('appointments'));
    }
}
