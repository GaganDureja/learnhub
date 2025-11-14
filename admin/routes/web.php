<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;


/*
|--------------------------------------------------------------------------
| HOME REDIRECT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (!Auth::check()) return redirect()->route('login');
    $role = Auth::user()->getRoleNames()->first();
    if (in_array($role, ['Master','SuperAdmin','Admin','SubAdmin','Instructor'])) {
        return redirect()->route('dashboard');
    }
    Auth::logout();
    return redirect('/');
});


/*
|--------------------------------------------------------------------------
| DASHBOARD + PROFILE (all allow)
|--------------------------------------------------------------------------
*/



// Route::middleware(['auth'])->prefix('admin')->group(function () {
Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Master + SuperAdmin (Full Control)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:Master,SuperAdmin'])->group(function () {

        // Restore deleted
        Route::post('/roles/{id}/restore', [RoleController::class, 'restore'])->name('roles.restore');
        Route::post('/permissions/{id}/restore', [PermissionController::class, 'restore'])->name('permissions.restore');

        // Permanent delete
        Route::delete('/roles/{id}/force-delete', [RoleController::class, 'forceDelete'])->name('roles.force-delete');
        Route::delete('/permissions/{id}/force-delete', [PermissionController::class, 'forceDelete'])->name('permissions.force-delete');
    });

    /*
    |--------------------------------------------------------------------------
    | Master + SuperAdmin + Admin + SubAdmin (Delete Control)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:Master,SuperAdmin,Admin,SubAdmin'])->group(function () {

        // Soft delete
        Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
        Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    });

    /*
    |--------------------------------------------------------------------------
    | Master + SuperAdmin + Admin + SubAdmin + Instructor (CRUD + Soft Delete)
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:Master,SuperAdmin,Admin,SubAdmin,Instructor'])->group(function () {

        Route::view('/dashboard','dashboard')->middleware('verified')->name('dashboard');
        Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');
        Route::patch('/profile',[ProfileController::class,'update'])->name('profile.update');
        Route::delete('/profile',[ProfileController::class,'destroy'])->name('profile.destroy');


        Route::resource('roles', RoleController::class)->only(['index','create','store','edit','update']);
        Route::resource('permissions', PermissionController::class)->only(['index','create','store','edit','update']);

    });

});


require __DIR__.'/auth.php';
