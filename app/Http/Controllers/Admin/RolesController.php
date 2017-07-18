<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RolesController extends Controller
{
    public function create()
    {
        return view('backend.roles.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
           'name' => 'required'
        ]);

        $role = new Role;
        $role->name = $request->get('name');
        $role->display_name = $request->get('display_name');
        $role->description = $request->get('description');

        $role->save();

        return redirect('/admin/roles/create')->with('status','A new role has been created.');
    }

    public function index()
    {
        $roles = Role::all();
        return view('backend.roles.index')->with('roles',$roles);
    }
}
