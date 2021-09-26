<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PassToNextDepartment extends Component
{
    public bool $toggleA = false;
    public function render()
    {
        return view('livewire.pass-to-next-department');
    }
}
