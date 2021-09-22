<?php

namespace App\Http\Livewire;

use App\Models\Counter;
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
        $counters = Counter::with(['serving', 'department'])
            ->where('department_id', auth()->user()->department_staff->department_id)
            ->get();

        return view('livewire.serving', compact('counters'));
    }
}
