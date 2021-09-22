<?php

namespace App\Http\Livewire;

use App\Models\Counter;
use Livewire\Component;
use Livewire\WithPagination;

class CounterTable extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {

        $counters = Counter::search($this->search)
            ->with('department')
            ->when(auth()->user()->chairman !== null, function ($query) {
                $query->where('department_id', auth()->user()->chairman->id);
            })
            ->orderByDesc('id')
            ->Paginate(3);
        return view('livewire.counter-table', compact('counters'));
    }
}
