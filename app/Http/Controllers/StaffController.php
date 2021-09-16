<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.chairman.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('users.chairman.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $staffs = User::create($request->validated());
        $staffs->attachRole('Staff');
        if ($request->hasFile('avatar')) {
            $avatar =  $staffs->id . '-' . $request->first_name . '-' . $request->last_name . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images/profile'), $avatar);
            $staffs->update(['avatar' => $avatar]);
        }

        return redirect()->route('staff.index')->with('message', 'Staff Added Successful');
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
    public function edit(User $staff)
    {
        return view('users.chairman.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $staff)
    {
        if ($staff->avatar)  unlink("images/profile/" . $staff->avatar);

        $staff->update($request->validated());

        if ($request->hasFile('avatar')) {
            $avatar =  $staff->id . '-' . $request->first_name . '-' . $request->last_name . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images/profile'), $avatar);
            $staff->update(['avatar' => $avatar]);
        }
        return redirect()->route('staff.index')->with('message', 'Staff Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('message', 'Deleted successfully');
    }
}
