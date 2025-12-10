<?php

namespace App\Http\Controllers;

use App\Helpers\AlertHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
        $this->authorize('role-list');
        $items = Role::with('permissions')->get();
        return view('roles.index', compact('items'));
    }

    /**
     * Show form to create a new role
     *
     */
    public function create()
    {
        $this->authorize('role-create');
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a new role
     * Only Master
     */
    public function store(Request $request)
    {
        $this->authorize('role-create');
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'nullable|array',
        ]);

        $role = Role::create(['name' => $request->name]);
        $permissions = Permission::whereIn('id', $request->permissions ?? [])
                    ->pluck('name')
                    ->toArray();
        $role->syncPermissions($permissions ?? []);
        AlertHelper::flash('Success', 'Role created successfully.', 'success');
        return redirect()->route('roles.index');
    }

    /**
     * Show form to edit a role
     * Only Master
     */
    public function edit($id)
    {
        $this->authorize('role-edit');
        $id = Crypt::decrypt($id);
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
        $this->authorize('role-edit');
        $id = Crypt::decrypt($id);
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
        ]);

        $role->update(['name' => $request->name]);
        $permissions = Permission::whereIn('id', $request->permissions ?? [])
                    ->pluck('name')
                    ->toArray();
        $role->syncPermissions($permissions);
        AlertHelper::flash('Success', 'Role updated successfully.', 'success');
        return redirect()->route('roles.index');
    }

    /**
     * Delete role
     * Only Master
     */
    public function destroy($id)
    {
        $this->authorize('role-delete');
        $id = Crypt::decrypt($id);
        $role = Role::findOrFail($id);
        $role->delete();
        AlertHelper::flash('Deleted', 'Role deleted successfully.', 'warning');
        return redirect()->route('roles.index');
    }

    public function restore($id)
    {
        $this->authorize('role-restore');
        $id = Crypt::decrypt($id);
        $role = Role::withTrashed()->findOrFail($id);
        $role->restore();
        AlertHelper::flash('Restored', 'Role restored successfully.', 'success');
        return redirect()->route('roles.index');
    }

    public function forceDelete($id)
    {
        $this->authorize('role-force-delete');
        $id = Crypt::decrypt($id);
        $role = Role::withTrashed()->findOrFail($id);
        $role->forceDelete();
        AlertHelper::flash('Deleted', 'Role permanently deleted!', 'danger');
        return redirect()->route('roles.index');
    }
}
