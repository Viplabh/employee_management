<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ManageRoleController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReportController;

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

Route::get('/logout', [ManageUserController::class, 'logout'])->name('logout');

Route::get('/dashboard', [ManageUserController::class, 'dashboard'])->name('dashboard');



Route::get('/users/manage_user', [ManageUserController::class, 'manage_user'])->name('users.manage_user');

Route::get('/users/add_user', [ManageUserController::class, 'viewAddUser'])->name('users.add_user');

Route::post('/user/store', [ManageUserController::class, 'store'])->name('user.store');

Route::get('/manage_users', [ManageUserController::class, 'manageUsers'])->name('manage_users');

Route::delete('/user/delete/{id}', [ManageUserController::class, 'deleteUser'])->name('user.delete');

Route::get('/user/edit/{id}', [ManageUserController::class, 'editUser'])->name('user.edit');

Route::put('/user/update/{id}', [ManageUserController::class, 'updateUser'])->name('user.update');



Route::get('/role/manage_role', [ManageRoleController::class, 'manage_role'])->name('role.manage_role');

Route::get('/role/add_role', [ManageRoleController::class, 'add_role'])->name('role.add_role');

Route::post('/save-role', [ManageRoleController::class, 'store'])->name('save.role');

Route::get('/role/manage_role', [ManageRoleController::class, 'manage_role'])->name('role.manage_role');

Route::get('/role/edit/{id}', [ManageRoleController::class, 'edit'])->name('role.edit');

Route::delete('/role/delete/{roleID}', [ManageRoleController::class, 'destroy'])->name('role.delete');

Route::get('/role/{roleID}/edit', [ManageRoleController::class, 'edit'])->name('role.edit');

Route::put('/role/{roleID}', [ManageRoleController::class, 'update'])->name('role.update');



Route::any('/upload_data', [DataController::class, 'upload'])->name('upload_data');

Route::any('/import', [DataController::class, 'import'])->name('import');

Route::get('/download-format', function () {
    $pathToFile = public_path('dummysheet.xls');
    return response()->download($pathToFile);})->name('download-format');



    
Route::get('/agent/search', [SearchController::class, 'search'])->name('agent.search');

Route::any('/agent/searchPhoneNumber', [SearchController::class, 'searchPhoneNumber'])->name('agent.searchPhoneNumber');

Route::post('/agent/customer_status', [SearchController::class, 'customer_status'])->name('agent.customer_status');



Route::get('/agent/report', [ReportController::class, 'report'])->name('agent.report');

Route::post('agent/daterange', [ReportController::class, 'daterange'])->name('agent.daterange');
