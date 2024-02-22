<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdServController;
use App\Http\Controllers\AppointmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/prodServ', [ProdServController::class, 'index'])->name('ProdServ.index');
Route::get('/appointment', [AppointmentController::class, 'index'])->name('Appointments.index');
