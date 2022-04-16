<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationTimeController;

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

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin'], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('reservation_times', [ReservationTimeController::class, 'index'])->name('admin.reservation_times');
    Route::get('reservation_times/create', [ReservationTimeController::class, 'create'])->name('admin.reservation_times.create');
    Route::get('reservation_times/{reservation_time}/edit', [ReservationTimeController::class, 'edit'])->name('admin.reservation_times.edit');
    Route::post('reservation_times', [ReservationTimeController::class, 'store'])->name('admin.reservation_times');
    Route::put('reservation_times/{reservation_time}', [ReservationTimeController::class, 'update'])->name('admin.reservation_times.update');


    Route::get('reservation_management', [App\Http\Controllers\ReservationController::class, 'index'])->name('admin.reservation_management');
    Route::get('reservation_management/{reservation}/edit', [App\Http\Controllers\ReservationController::class, 'edit'])->name('admin.reservation_management.edit');
    Route::put('reservation_management/{reservation}', [App\Http\Controllers\ReservationController::class, 'update'])->name('admin.reservation_management.update');



    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'admin_dashboard'])->name('admin.dashboard');
});

Route::get('/', function () {
    return redirect('login');

});
Route::get('/prereservation', function () {
    return view('preReservation');

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/my_reservations', [App\Http\Controllers\ReservationController::class, 'my_reservations'])->name('my_reservations');

// Route::get('/reservatioNow', [App\Http\Controllers\CupboardController::class, 'index']);
Route::post('/reserve_now/{locker}', [App\Http\Controllers\ReservationController::class, 'reserve_locker']);
Route::get('/reserve_now', [App\Http\Controllers\ReservationController::class, 'reserve_now']);
Route::get('/completed_reservation/{reservation}', [App\Http\Controllers\ReservationController::class, 'completed_reservation'])->name('completed_resrevation');


// Route::get('/anyPath/{locker}', [App\Http\Controllers\CupboardController::class, 'index']);



// Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index']);
// Route::get('/companies/create', [App\Http\Controllers\CompanyController::class, 'create']);
// Route::get('/companies/{company}/edit', [App\Http\Controllers\CompanyController::class, 'edit']);
// Route::post('/companies', [App\Http\Controllers\CompanyController::class, 'store']);
// Route::post('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'update']);
// Route::post('/companies/{company}/destroy', [App\Http\Controllers\CompanyController::class, 'destroy']);



// Route::get('/intervals', [App\Http\Controllers\IntervlController::class, 'index']);
