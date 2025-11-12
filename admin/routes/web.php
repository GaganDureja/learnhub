<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    if (Auth::check()) {
        $role = Auth::user()->getRoleNames()->first();
        // Redirect non-students to dashboard, students elsewhere
        if (in_array($role, ['Master', 'SuperAdmin', 'Admin', 'SubAdmin', 'Teacher', 'Mentor'])) {
            return redirect()->route('dashboard');
        }

        // Student role → redirect to student portal (or logout)
        Auth::logout();
        return redirect('https://google.com'); // change this to your student panel domain
    }
    return redirect()->route('login');
});

Route::middleware(['auth', 'role:Master, SuperAdmin, Admin, SubAdmin, Teacher, Mentor'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Master can create/edit/delete roles and permissions
Route::middleware(['auth', 'role:Master'])
    ->prefix('admin')
    ->group(function () {
        Route::resource('roles', RoleController::class)->except(['index']);
        Route::resource('permissions', PermissionController::class)->except(['index']);;
    });


// All super roles can view roles and permissions
Route::middleware(['auth', 'role:Master,SuperAdmin,Admin,SubAdmin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
        Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    });

require __DIR__ . '/auth.php';
