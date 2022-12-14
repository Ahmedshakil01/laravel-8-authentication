<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\DashboardController;
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

Route::get('login/admin', [AdminController::class, 'adminLoginForm'])->name('admin.login.form');
Route::post('admin-login', [AdminController::class, 'adminLogin'])->name('admin.login');

Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/dashboard', [AdminDashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});



Route::group(['middleware'=>'auth'],function(){
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard']);
});

