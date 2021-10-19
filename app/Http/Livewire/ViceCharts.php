<?php

namespace App\Http\Livewire;

use App\Charts\TransactionPerDepartment;
use App\Models\Department;
use Livewire\Component;



class ViceCharts extends Component
{
    public $search = 1;
    public function render(TransactionPerDepartment $chart)
    {
        $myDepartments = Department::select('id', 'description')->where('vp_id', auth()->user()->id)->get();
        return view('livewire.vice-charts', ['chart' => $chart->build($this->search), 'departments' => $myDepartments]);
    }
}
