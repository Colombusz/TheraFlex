<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdServController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;
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


Route::prefix('admin')->group(function () {
    Route::get('/',[ServiceController::class, 'index'] )->name('services.index');
    Route::get('/create',[ServiceController::class, 'create'] )->name('services.create');
    Route::post('/store',[ServiceController::class, 'store'] )->name('services.store');
    Route::get('/{id}/edit',[ServiceController::class, 'edit'] )->name('services.edit');
    Route::post('/update',[ServiceController::class, 'update'] )->name('services.update');
    Route::delete('/{id}/delete',[ServiceController::class, 'delete'] )->name('services.delete');
});
