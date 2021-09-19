<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;

class ChairmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.vice-pres.chairman.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.vice-pres.chairman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $chairman = User::create($request->validated());
        $chairman->attachRole('Department_Head');

        if ($request->hasFile('avatar')) {
            $avatar =  $chairman->id . '-' . $request->first_name . '-' . $request->last_name . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images/profile'), $avatar);
            $chairman->update(['avatar' => $avatar]);
        }
        return redirect()->route('chairman.index')->with('message', 'Chairman Added Successful');
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
    public function edit(User $chairman)
    {;
        return view('users.vice-pres.chairman.edit', compact('chairman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $chairman)
    {
        if ($chairman->avatar)  unlink("images/profile/" . $chairman->avatar);
        $chairman->update($request->validated());

        if ($request->hasFile('avatar')) {
            $avatar =  $chairman->id . '-' . $request->first_name . '-' . $request->last_name . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images/profile'), $avatar);
            $chairman->update(['avatar' => $avatar]);
        }
        return redirect()->route('chairman.index')->with('message', 'Teacher Profile Updated successfully');
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
