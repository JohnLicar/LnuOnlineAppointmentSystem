<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Department;
use App\Models\Logs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ViceDashboard extends Controller
{
    public function index()
    {

        $myDepartments = Department::select('id', 'description')->where('vp_id', auth()->user()->id)->get();
        // dd($myDepartments);
        if (auth()->user()->vice_pres) {

            $appointmentToday = Appointment::whereIn('department_id', $myDepartments)
                ->whereDate('created_at', Carbon::today())
                ->count();

            $completedToday = Logs::whereIn('department_id', $myDepartments)
                ->whereDate('created_at', Carbon::today())
                ->count();
        }
        return view('users.vice-pres.dashboard', compact('appointmentToday', 'completedToday', 'myDepartments'));
    }
}
