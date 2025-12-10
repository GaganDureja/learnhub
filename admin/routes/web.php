<?php

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;


/*
|--------------------------------------------------------------------------
| HOME REDIRECT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    $validRoles = Role::pluck('name')->toArray();
    if (Auth::user()->hasAnyRole($validRoles)) {
        return redirect()->route('dashboard');
    }
    // If user has any other role
    return redirect()->route('login')->with('error', 'Unauthorized access.');
});


Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // Roles module
    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('index')->middleware('permission:role-list');
        Route::get('/create', [RoleController::class, 'create'])->name('create')->middleware('permission:role-create');
        Route::post('/', [RoleController::class, 'store'])->name('store')->middleware('permission:role-create');
        Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit')->middleware('permission:role-edit');
        Route::put('/{role}', [RoleController::class, 'update'])->name('update')->middleware('permission:role-edit');
        Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy')->middleware('permission:role-delete');
    });

    // Permissions module
    Route::prefix('permissions')->name('permissions.')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index')->middleware('permission:permission-list');
    });

    // Users module
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index')->middleware('user:role-list');
        Route::get('/create', [UserController::class, 'create'])->name('create')->middleware('user:role-create');
        Route::post('/', [UserController::class, 'store'])->name('store')->middleware('user:role-create');
        Route::get('/{role}/edit', [UserController::class, 'edit'])->name('edit')->middleware('user:role-edit');
        Route::put('/{role}', [UserController::class, 'update'])->name('update')->middleware('user:role-edit');
        Route::delete('/{role}', [UserController::class, 'destroy'])->name('destroy')->middleware('user:role-delete');
        Route::post('/{role}/restore', [UserController::class, 'restore'])->name('restore')->middleware('user:role-restore');
        Route::delete('/{role}/force-delete', [UserController::class, 'forceDelete'])->name('force-delete')->middleware('user:role-force-delete');
    });

});


require __DIR__ . '/auth.php';
