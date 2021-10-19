<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\File;

class VicePresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('users.admin.vice-pres.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.admin.vice-pres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $VicePresident = User::create($request->validated());
        $VicePresident->attachRole('Vice_President');

        if ($request->hasFile('avatar')) {
            $avatar =  $VicePresident->id . '-' . $request->first_name . '-' . $request->last_name . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images/profile'), $avatar);
            $VicePresident->update(['avatar' => $avatar]);
        }

        return redirect()->route('vice-pres.index')->with('message', 'Vice President Added Successful');
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
    public function edit(User $vice_pre)
    {

        return view('users.admin.vice-pres.edit', compact('vice_pre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $vice_pre)
    {
        if ($vice_pre->avatar)  unlink("images/profile/" . $vice_pre->avatar);
        $vice_pre->update($request->validated());

        if ($request->hasFile('avatar')) {
            $avatar =  $vice_pre->id . '-' . $request->first_name . '-' . $request->last_name . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('images/profile'), $avatar);
            $vice_pre->update(['avatar' => $avatar]);
        }
        return redirect()->route('vice-pres.index')->with('message', 'Teacher Profile Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $vice_pre)
    {
        $vice_pre->delete();
        File::delete('images/profile/' . $vice_pre->avatar);
        return redirect()->route('vice-pres.index')->with('message', 'Teacher Profile Deleted successfully');
    }
}
