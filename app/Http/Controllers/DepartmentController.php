<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.admin.department.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $chairs = Department::whereNotNull('chairman_id')->get('chairman_id')->toArray();
        $vice_presidents = User::with('vice_pres')->whereRoleIs('Vice_President')->get();
        $chairmans = User::with('chairman')->whereRoleIs('Department_Head')
            ->whereNotIn('id', $chairs)
            ->get();
        return view('users.admin.department.create', compact('vice_presidents', 'chairmans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        Department::create($request->validated());
        return redirect()->route('department.index')->with('message', 'Department Added Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $chairs = Department::whereNotNull('chairman_id')->get('chairman_id');
        $vice_presidents = User::with('vice_pres')->whereRoleIs('Vice_President')->get();
        $chairmans = User::with('chairman')->whereRoleIs('Department_Head')
            ->whereNotIn('id', $chairs)
            ->get();

        return view('users.admin.department.edit', compact('department', 'vice_presidents', 'chairmans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());
        return view('users.admin.department.index')->with('message', 'Department Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('department.index')->with('message', 'Teacher Profile Deleted successfully');
    }
}
