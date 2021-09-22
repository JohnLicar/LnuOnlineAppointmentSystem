<?php

namespace App\Http\Livewire;

use App\Models\Counter;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\User;

class ServiceTable extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {

        $services = Service::search($this->search)
            ->with('department')
            ->where('department_id', auth()->user()->chairman->id)
            ->orderByDesc('id')
            ->Paginate(3);
        return view('livewire.service-table', compact('services'));
    }
}
