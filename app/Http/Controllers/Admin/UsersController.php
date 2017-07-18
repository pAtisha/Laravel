<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.users.index')->with('users',$users);
    }

    public function edit($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $roles = Role::all();
        $selectedRoles = $user->roles->pluck('id')->toArray();

        return view('backend.users.edit')->with('user',$user)->with('roles',$roles)->with('selectedRoles',$selectedRoles);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'min:6|confirmed',
            'password_confirmation' => 'min:6',
        ]);
        $user = User::whereId($id)->firstOrFail();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $password = $request->get('password');
        if($password != ""){
            $user->password = Hash::make($password);
        }

        $user->save();
        $user->saveRoles($request->get('role'));

        return redirect(action('Admin\UsersController@edit',$user->id))->with('status','The user has been updated');
    }
}
