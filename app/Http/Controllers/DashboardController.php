<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isAn('Admin')) return view('users.admin.dashboard');

        if (auth()->user()->isAn('Vice_President')) return view('users.vice-pres.dashboard');

        if (auth()->user()->isAn('Department_Head')) return view('users.chairman.dashboard');

        if (auth()->user()->isAn('Staff')) return redirect()->route('appointments.index');

        // if (auth()->user()) return view('auth.login');
    }
}
