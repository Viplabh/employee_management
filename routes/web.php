<?php

use App\Http\Controllers\ManageRoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManageUserController;



Route::view('master', 'partials.master');


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/dashboard', [UserController::class,'dashboard']) ->name ('dashboard');

Route::get('/users/manage_user', [ManageUserController::class,'manage_user']) ->name ('users.manage_user');

Route::get('/users/add_user', [ManageUserController::class,'add_user']) ->name ('users.add_user');

Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/manage_users', [UserController::class, 'manageUsers'])->name('manage_users');

Route::delete('/user/delete/{id}', [ManageUserController::class, 'deleteUser'])->name('user.delete');
Route::get('/user/edit/{id}', [ManageUserController::class, 'editUser'])->name('user.edit');
Route::put('/user/update/{id}', [ManageUserController::class, 'updateUser'])->name('user.update');




Route::get('/role/manage_role', [ManageRoleController::class,'manage_role']) ->name ('role.manage_role');

Route::get('/role/add_role', [ManageRoleController::class,'add_role']) ->name ('role.add_role');

Route::post('/save-role', [ManageRoleController::class,'store'])->name('save.role');

Route::get('/role/manage_role', [ManageRoleController::class, 'manage_role'])->name('role.manage_role');

Route::get('/role/edit/{id}', [ManageRoleController::class, 'edit'])->name('role.edit');
Route::delete('/role/delete/{roleID}', [ManageRoleController::class, 'destroy'])->name('role.delete');

