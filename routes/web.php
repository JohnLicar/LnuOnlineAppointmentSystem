<?php

use App\Events\ServingDisplay;
use App\Http\Controllers\{
    AppointmentController,
    AvailableSlotController,
    CalenderController,
    ChairmanController,
    ChairmanDashboard,
    CounterController,
    DashboardController,
    DepartmentController,
    SaveAppointment,
    ServiceController,
    StaffController,
    VicePresController
};
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
})->name('welcome');

Route::post('store', SaveAppointment::class)->name('store');

Route::get('/available/slots/{appointmentDate}', [AvailableSlotController::class, '__invoke'])->name('available.slot');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'admin', 'middleware' => ['role:Admin']], function () {
        Route::resource('vice-pres', VicePresController::class);
        Route::resource('department', DepartmentController::class);
    });

    Route::group(['prefix' => 'vice-pres', 'middleware' => ['role:Vice_President']], function () {
        Route::resource('chairman', ChairmanController::class);
    });

    Route::group(['prefix' => 'chairman', 'middleware' => ['role:Department_Head']], function () {
        Route::resource('/dashboard', ChairmanDashboard::class);
        Route::resource('staff', StaffController::class);
        Route::resource('service', ServiceController::class);
        Route::resource('counter', CounterController::class);
    });

    Route::group(['prefix' => 'staff', 'middleware' => ['role:Staff']], function () {

        Route::get('serving/{serving}', [AppointmentController::class, 'servings'])->name('serving');
        Route::resource('appointments', AppointmentController::class);
    });
});
require __DIR__ . '/auth.php';
