<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DependentController;

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

 //some route for depending selected option
 Route::post('/depend/on/office/to/role', [DependentController::class, 'dependentOnOfficeToRole'])->name('depend.on.office.to.role');
 Route::post('/depend/on/role/to/inspector', [DependentController::class, 'dependentOnRoleToInspector'])->name('depend.on.role.to.inspector');
 Route::post('/depend/on/division/to/role', [DependentController::class, 'dependentOnDivToRole'])->name('depend.on.div.to.role');
 Route::post('/depend/on/division/to/office', [DependentController::class, 'OfficedependentOnDivision'])->name('depend.on.division.to.office');
