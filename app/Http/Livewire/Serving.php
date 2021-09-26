<?php

namespace App\Http\Livewire;

use App\Models\Counter;
use App\Models\Serving as ModelsServing;
use Livewire\Component;

class Serving extends Component
{
    public $counterCall;
    public $next;
    public $call;

    // protected $listeners = ['update-display' => 'render'];
    protected $listeners = ['echo:update-display,ServingDisplay' => 'render'];

    public function render()
    {
        $counters = Counter::with(['serving', 'serving.appointment'])
            ->where('department_id', auth()->user()->department_staff->department_id)
            ->orderBy('id', 'DESC')
            ->get();

        $nextQueue = ModelsServing::with('appointment', 'nextQueue', 'counter')->WhereIn('counter_id', $counters->pluck('id'))
            ->latest()->first();

        return view('livewire.serving', compact('nextQueue', 'counters'));
    }
}
