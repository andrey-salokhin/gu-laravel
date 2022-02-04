<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersCreate;
use App\Http\Requests\UsersUpdate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersCreate $request)
    {
        $data = $request->validated();
        if(array_key_exists('is_admin', $data)){
            $data['is_admin'] = boolval($data['is_admin']);
        }
        $data['password'] = Hash::make($data['password']);
        $create = User::create($data);
        if($create){
            return redirect()->route('users.index')->with('update-success', 'User ' . $create->name . ' was successfully created!');
        } else {
            return back()->with('fail', 'Something goes wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdate $request, User $user)
    {
        $data = $request->validated();
        $user = User::find($user->id);
        $user->name       = $request->get('name');
        $user->password      = Hash::make($request->get('password'));
        $user->email      = $request->get('email');
        $user->is_admin      = boolval($request->get('is_admin'));
        $save = $user->save();
        if($save){
            return redirect()->route('users.index')->with('update-success', 'User ' . $user->name . ' was successfully updated!');
        } else {
            return back()->with('fail', 'Something goes wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('remove-success', 'User ' . $user->name . ' was successfully deleted!');
    }
}
