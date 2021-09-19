<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Serving as ModelsServing;
use Carbon\Carbon;
use Livewire\Component;

class Serving extends Component
{
    protected $listeners = ['updateAppointments' => 'render'];

    public function render()
    {
        // $servings = ModelsServing::all();
        return view('livewire.serving', ['servings' => ModelsServing::all()]);
    }
}
