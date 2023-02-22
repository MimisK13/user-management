<?php

namespace Mimisk13\UserManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return view('user-management::permissions.index', [
            'permissions' => Permission::with('roles:name')->get()
        ]);
    }

    public function create()
    {
        return view('user-management::permissions.create', [
            'roles' => Role::pluck('name', 'id')
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'unique:permissions'
            ],

            'roles' => ['array'],
        ]);

        $permission = Permission::create($data);

        $permission->syncRoles($request->input('roles'));

        return redirect()->route('user-management.permissions.index');
    }

    public function edit(Permission $permission)
    {
        return view('user-management::permissions.edit', [
            'permission' => $permission,
            'roles' => Role::pluck('name', 'id')
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'unique:permissions,id,' . $permission->id],
            'roles' => ['array'],
        ]);

        $permission->update($data);

        $permission->syncRoles($request->input('roles'));

        return redirect()->route('user-management.permissions.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('user-management.permissions.index');
    }

}
