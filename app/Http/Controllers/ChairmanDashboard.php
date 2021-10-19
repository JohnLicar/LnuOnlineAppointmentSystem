<?php

namespace App\Http\Controllers;

use App\Charts\ChairmanChart;
use App\Models\Appointment;
use App\Models\Logs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChairmanDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ChairmanChart $chart)
    {
        if (auth()->user()->chairman) {

            $appointmentToday = Appointment::where('department_id', auth()->user()->chairman->id)
                ->whereDate('created_at', Carbon::today())
                ->count();

            $completedToday = Logs::where('department_id', auth()->user()->chairman->id)
                ->whereDate('created_at', Carbon::today())
                ->count();
        }
        return view('users.chairman.dashboard', compact('appointmentToday', 'completedToday'), ['chart' => $chart->build()]);
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
