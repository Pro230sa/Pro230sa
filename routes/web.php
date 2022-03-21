<?php

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
Route::get('/prereservation', function () {
    return view('prereservation');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reservationnow', function () {
    return view('reservationnow');
});



Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index']);
Route::get('/companies/create', [App\Http\Controllers\CompanyController::class, 'create']);
Route::get('/companies/{company}/edit', [App\Http\Controllers\CompanyController::class, 'edit']);
Route::post('/companies', [App\Http\Controllers\CompanyController::class, 'store']);
Route::post('/companies/{company}', [App\Http\Controllers\CompanyController::class, 'update']);
Route::post('/companies/{company}/destroy', [App\Http\Controllers\CompanyController::class, 'destroy']);
