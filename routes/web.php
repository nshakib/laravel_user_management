<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Dashboard
Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('users', UserController::class);
    
    Route::resource('permissions', PermissionController::class);
    Route::delete('permissions_mass_destroy', [\App\Http\Controllers\Admin\PermissionController::class, 'massDestroy'])->name('permissions.mass_destroy');
    Route::resource('roles', RoleController::class);

    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::delete('users_mass_destroy', [UserController::class, 'massDestroy'])->name('users.mass_destroy');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
