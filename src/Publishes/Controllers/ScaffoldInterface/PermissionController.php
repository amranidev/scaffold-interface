<?php

namespace App\Http\Controllers\ScaffoldInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('scaffold-interface.permissions.index', compact('permissions'));
    }
    public function create()
    {
        return view('scaffold-interface.permissions.create');
    }

    public function store(Request $request)
    {
        Permission::create(['name' => $request->name]);

        return redirect('permissions');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('scaffold-interface.permissions.edit', compact('permission'));
    }

    public function update(Request $request)
    {
        $permission = Permission::findOrFail($request->permission_id);

        $permission->name = $request->name;

        $permission->update();
        
        return redirect('permissions');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        $permission->delete();

        return redirect('permissions');
    }
}
