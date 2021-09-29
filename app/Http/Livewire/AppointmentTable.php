<?php

namespace App\Http\Livewire;

use App\Actions\SendNotificationToFirstFiveQueue;
use App\Models\Appointment;
use App\Events\ServingDisplay;
use App\Events\AppointmentEvent;
use App\Models\Counter;
use App\Models\Serving;
use Carbon\Carbon;
use Livewire\Component;

class AppointmentTable extends Component
{
    public $counter_id;
    public $counters;

    public function mount()
    {
        $this->counters = Counter::where('department_id', auth()->user()->department_staff->department_id)->get();
    }

    protected $listeners = ['echo:update-appointment-display,AppointmentEvent' => 'render'];

    public function render()
    {
        $appointments = Appointment::with('department')
            ->where('scheduled_date', Carbon::now()->toDateString())
            ->where('department_id', auth()->user()->department_staff->department_id)
            ->where('serving', false)
            ->get();

        return view('livewire.appointment-table', compact('appointments'));
    }

    public function callQueue($appointment_id, $counter_id, $next = null, SendNotificationToFirstFiveQueue $sendNotificationToFirstFiveQueue)
    {


        $serving = Serving::create([
            'appointment_id' => $appointment_id,
            'counter_id' => $counter_id,
            'next_id' => $next
        ]);

        $appointment =  tap(Appointment::where('id', $appointment_id))
            ->update(['serving' => true])
            ->first();

        event(new AppointmentEvent());
        event(new ServingDisplay());
        $this->emit('ServingQueued', $appointment, $serving->id, $counter_id);

        // $sendNotificationToFirstFiveQueue->execute(auth()->user()->department_staff->department->description);
    }
}
