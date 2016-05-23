<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Requests;
use App\Models\User;
use App\Models\UserRole;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
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
        $user = User::find($id);
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.index');
    }

    /**
     * Return all the tenants where first_name, first_last_name or email agree with $search.
     *
     * @param  string  $search
     * @return \Illuminate\Http\Response
     */
    public function getTenants($search)
    {
        $users=UserRole::select('id')->where('key','tenant')->first()->searchUsers($search)->take(5)->get();
        return $users;
    }
}
