<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Helpers\AlertHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Show all data
     *
     */
    public function index()
    {
        $this->authorize('user-list');
        $items = User::get();
        return view('users.index', compact('items'));
    }

    /**
     * Show form to create a new data
     *
     */
    public function create()
    {
        $this->authorize('user-create');
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a new data
     *
     */
    public function store(Request $request)
    {
        $this->authorize('user-create');
        $request->validate([
            'name' => 'required|unique:users,name',
            'permissions' => 'nullable|array',
        ]);

        $user = User::create(['name' => $request->name]);
        $user->syncRoles($request->roles ?? []);
        AlertHelper::flash('Success', 'User created successfully.', 'success');
        return redirect()->route('users.index');
    }

    /**
     * Show form to edit a data
     *
     */
    public function edit($id)
    {
        $this->authorize('user-edit');
        $id = Crypt::decrypt($id);
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update a data
     *
     */
    public function update(Request $request, $id)
    {
        $this->authorize('user-edit');
        $id = Crypt::decrypt($id);
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:users,name,' . $user->id,
            'permissions' => 'nullable|array',
        ]);

        $user->update(['name' => $request->name]);
        $user->syncRoles($request->roles ?? []);
        AlertHelper::flash('Success', 'User updated successfully.', 'success');
        return redirect()->route('users.index');
    }

    /**
     * Delete data
     *
     */
    public function destroy($id)
    {
        $this->authorize('user-delete');
        $id = Crypt::decrypt($id);
        $user = User::findOrFail($id);
        $user->delete();
        AlertHelper::flash('Deleted', 'User deleted successfully.', 'warning');
        return redirect()->route('users.index');
    }


    /**
     * Restore data
     *
     */
    public function restore($id)
    {
        $this->authorize('user-restore');
        $id = Crypt::decrypt($id);
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        AlertHelper::flash('Restored', 'User restored successfully.', 'success');
        return redirect()->route('users.index');
    }

    /**
     * Permanent Delete data
     *
     */
    public function forceDelete($id)
    {
        $this->authorize('user-force-delete');
        $id = Crypt::decrypt($id);
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        AlertHelper::flash('Deleted', 'User permanently deleted!', 'danger');
        return redirect()->route('users.index');
    }
}
