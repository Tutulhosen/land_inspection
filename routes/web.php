<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScheduleController;
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

Route::get('/login-page', [LoginController::class, 'login_page'])->name('admin.login.index');
Route::post('/logedIn', [LoginController::class, 'loginProcess'])->name('admin.logedin');

Route::get('/dashboard-page', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/schedule-page', [ScheduleController::class, 'SchedulePage'])->name('schedule.page.index');
