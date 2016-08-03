<?php

namespace App\Http\Controllers\ScaffoldInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('scaffold-interface.roles.index', compact('roles'));
    }
    public function create()
    {
        return view('scaffold-interface.roles.create');
    }

    public function store(Request $request)
    {
        Role::create(['name' => $request->name]);

        return redirect('roles');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('scaffold-interface.roles.edit', compact('role'));
    }

    public function update(Request $request)
    {
        $role = Role::findOrFail($request->role_id);

        $role->name = $request->name;

        $role->update();
        
        return redirect('roles');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect('roles');
    }
}
