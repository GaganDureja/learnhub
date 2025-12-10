<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Show all data.
     */
    public function index()
    {
        $this->authorize('permission-list');
        $items = Permission::all();
        return view('permissions.index', compact('items'));
    }
}
