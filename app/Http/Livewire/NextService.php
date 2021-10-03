<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class NextService extends Component
{
    public $departmentId = '';

    public function render()
    {
        $services = Service::where('department_id', $this->departmentId)->get();
        return view('livewire.next-service', compact('services'));
    }
}
