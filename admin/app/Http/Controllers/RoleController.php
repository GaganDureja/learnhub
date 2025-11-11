<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show all roles
     * Accessible by Master, SuperAdmin, Admin, SubAdmin
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show form to create a new role
     * Only Master
     */
    public function create()
    {
        if (!auth()->user()->hasRole('Master')) {
            abort(403, 'Unauthorized access');
        }

        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a new role
     * Only Master
     */
    public function store(Request $request)
    {
        if (!auth()->user()->hasRole('Master')) {
            abort(403, 'Unauthorized access');
        }

        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'nullable|array',
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Show form to edit a role
     * Only Master
     */
    public function edit($id)
    {
        if (!auth()->user()->hasRole('Master')) {
            abort(403, 'Unauthorized access');
        }

        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update a role
     * Only Master
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->hasRole('Master')) {
            abort(403, 'Unauthorized access');
        }

        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Delete role
     * Only Master
     */
    public function destroy($id)
    {
        if (!auth()->user()->hasRole('Master')) {
            abort(403, 'Unauthorized access');
        }

        $role = Role::findOrFail($id);
        $role->delete();

        return back()->with('success', 'Role deleted successfully.');
    }
}
