<?php

namespace App\Http\Controllers\ScaffoldInterface;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\User::all();

        return view('scaffold-interface.users.index', compact('users'));
    }

    public function create()
    {
        return view('scaffold-interface.users.create');
    }

    public function store(Request $request)
    {
        $user = new \App\User();

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('users');
    }

    public function edit($id)
    {
        $user = \App\User::findOrfail($id);
        $roles = Role::all()->pluck('name');
        $permissions = Permission::all()->pluck('name');
        $userRoles = $user->roles;
        $userPermissions = $user->permissions;

        return view('scaffold-interface.users.edit', compact('user', 'roles', 'permissions', 'userRoles', 'userPermissions'));
    }

    public function update(Request $request)
    {
        $user = \App\User::findOrfail($request->user_id);

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('users');
    }

    public function destroy($id)
    {
        $user = \App\User::findOrfail($id);

        $user->delete();

        return redirect('users');
    }

    public function addRole(Request $request)
    {
        $user = \App\User::findOrfail($request->user_id);
        $user->assignRole($request->role_name);

        return redirect('users/edit/'.$request->user_id);
    }

    public function addPermission(Request $request)
    {
        $user = \App\User::findorfail($request->user_id);
        $user->givePermissionTo($request->permission_name);

        return redirect('users/edit/'.$request->user_id);
    }

    public function revokePermission($permission, $user_id)
    {
        $user = \App\User::findorfail($user_id);

        $user->revokePermissionTo(str_slug($permission, ' '));
        
        return redirect('users/edit/'.$user_id);
    }

    public function revokeRole($role, $user_id)
    {
        $user = \App\User::findorfail($user_id);

        $user->removeRole(str_slug($role, ' '));
        
        return redirect('users/edit/'.$user_id);
    }
}
