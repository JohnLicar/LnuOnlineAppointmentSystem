<?php

namespace App\Http\Livewire;

use App\Actions\SendNotificationToFirstFiveQueue;
use App\Models\Appointment;
use App\Events\ServingDisplay;
use App\Events\AppointmentEvent;
use App\Models\Counter;
use App\Models\Service;
use App\Models\Serving;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentTable extends Component
{
    use WithPagination;
    public $counter_id = '';
    public $serviceId = '';

    protected $listeners = ['echo:update-appointment-display,AppointmentEvent' => 'render'];

    public function render()
    {
        $existing = Serving::all();

        $counters = Counter::select('id', 'description')->where('department_id', auth()->user()->department_staff->department_id)->get();
        $services = Service::select('id', 'description')->where('department_id', auth()->user()->department_staff->department_id)->get();

        $appointments = Appointment::search($this->serviceId)
            ->with('service', 'department')
            ->where('scheduled_date', Carbon::now()->toDateString())
            ->where('department_id', auth()->user()->department_staff->department_id)
            ->where('serving', false)
            ->orderByDesc('waiting')
            ->whereNotIn('id', $existing->pluck('appointment_id'))
            ->Paginate(5);

        return view('livewire.appointment-table', compact('appointments', 'counters', 'services'));
    }

    public function updatedServiceId()
    {
        $this->resetPage();
    }

    public function callQueue($appointment_id, $counter_id, $next = null, SendNotificationToFirstFiveQueue $sendNotificationToFirstFiveQueue)
    {
        // if (session()->has('waiting')) {
        //     session()->forget('waiting');
        // } else {
        if (session()->has('serving')) {
        } else {
            $existing = Serving::with('appointment')->where('counter_id', $counter_id)->first();

            if ($existing) {
                session()->push('serving', $existing->appointment);
                $this->emit('ServingQueued', $existing->appointment, $existing->id, $counter_id);
            } else {

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

                $sendNotificationToFirstFiveQueue->execute(auth()->user()->department_staff->department->description);
            }
        }
        // }
    }
}
