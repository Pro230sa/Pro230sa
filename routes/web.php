<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\AdminController;

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

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::get('/', function () {
    return view('welcome');

});
Route::get('/prereservation', function () {
    return view('preReservation');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reservationnow', [App\Http\Controllers\CupboardController::class, 'index']);


// Route::get('/anyPath/{locker}', [App\Http\Controllers\CupboardController::class, 'index']);



Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index']);
Route::get('/companies/create', [App\Http\Controllers\CompanyController::class, 'create']);
Route::get('/companies/{company}/edit', [App\Http\Controllers\CompanyController::class, 'edit']);
Route::post('/companies', [App\Http\Controllers\CompanyController::class, 'store']);
Route::post('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'update']);
Route::post('/companies/{company}/destroy', [App\Http\Controllers\CompanyController::class, 'destroy']);



Route::get('/intervals', [App\Http\Controllers\IntervlController::class, 'index']);
