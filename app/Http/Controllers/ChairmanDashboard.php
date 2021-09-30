<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Logs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ChairmanDashboard extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth()->user()->chairman) {

            $appointmentToday = Appointment::where('department_id', auth()->user()->chairman->id)
                ->whereDate('created_at', Carbon::today())
                ->count();

            $completedToday = Logs::where('department_id', auth()->user()->chairman->id)
                ->whereDate('created_at', Carbon::today())
                ->count();
        }

        $chart_options = [
            'chart_title' => 'Appointment by dates',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Logs',
            'conditions'            => [
                ['name' => 'Appointment made in last 7 days', 'condition' => 'department_id = ' . auth()->user()->chairman->id, 'color' => 'blue', 'fill' => true],
            ],
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'count',
            'filter_period' => 'week',
            'chart_type' => 'line',
        ];

        $chart1 = new LaravelChart($chart_options);
        // dd($chart1);
        return view('users.chairman.dashboard', compact('chart1', 'appointmentToday', 'completedToday'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
