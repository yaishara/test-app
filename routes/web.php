<?php

use App\Http\Controllers\backend\CompanyController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\PermissionController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\UserProfileController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['web', 'auth'])->group(function () {

    Route::resource('users', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('user/profile', UserProfileController::class);
    Route::post('user/passwordChange/{id}',[UserProfileController::class,'change_password'])->name('users.passwordChange');

});
