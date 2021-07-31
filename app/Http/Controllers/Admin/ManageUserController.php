<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('user_verify','1')
                ->where('role', null)
                ->where('block', 0)->get();
        return view('admin.user.index',['users' => $users]);
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$id)
    {
        $user=$user->findOrFail($id);
        return view('admin.user.show',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {
        $user=$user->findOrFail($id);
        return view('admin.user.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    // pending users

    public function pendingUsers(){
        $user=User::where('user_verify','0')
                    ->where('role', null)
                    ->where('block', 0)->get();
        return view('admin.user.pending_user',['users'=>$user]);
    }
    public function blockedUsers(){
        $user=User::where('block','1')
                    ->where('role', null)->get();
        return view('admin.user.blocked-users',['users'=>$user]);
    }
}
