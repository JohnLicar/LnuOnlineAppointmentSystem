<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class MyDepartment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('users.vice-pres.my-department.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chairs = Department::whereNotNull('chairman_id')->get('chairman_id')->toArray();
        $chairmans = User::with('chairman')->whereRoleIs('Department_Head')
            ->whereNotIn('id', $chairs)
            ->get();
        return view('users.vice-pres.my-department.create', compact('chairmans'));
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
        return redirect()->route('my-department.index')->with('message', 'Department Added Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Department $my_department)
    {
        return view('users.vice-pres.my-department.show', compact('my_department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $my_department)
    {
        $chairs = Department::where('chairman_id', '!=', $my_department->chairman_id)
            ->whereNotNull('chairman_id')
            ->get('chairman_id');

        $chairmans = User::with('chairman')->whereRoleIs('Department_Head')
            ->whereNotIn('id', $chairs)
            ->get();

        return view('users.vice-pres.my-department.edit', compact('my_department', 'chairmans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, Department $my_department)
    {
        $my_department->update($request->validated());
        return view('users.vice-pres.my-department.index')->with('message', 'Department Updated Successfully');
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
