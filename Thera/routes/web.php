<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdServController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PayrollController;
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


Route::prefix('admin/services')->group(function () {
    Route::get('/',[ServiceController::class, 'index'] )->name('services.index');
    Route::get('/create',[ServiceController::class, 'create'] )->name('services.create');
    Route::post('/store',[ServiceController::class, 'store'] )->name('services.store');
    Route::get('/{id}/edit',[ServiceController::class, 'edit'] )->name('services.edit');
    Route::post('/update',[ServiceController::class, 'update'] )->name('services.update');
    Route::delete('/{id}/delete',[ServiceController::class, 'delete'] )->name('services.delete');
});

Route::prefix('admin/products')->group(function () {
    Route::get('/',[ProductController::class, 'index'] )->name('products.index');
    Route::get('/create',[ProductController::class, 'create'] )->name('products.create');
    Route::post('/store',[ProductController::class, 'store'] )->name('products.store');
    Route::get('/{id}/edit',[ProductController::class, 'edit'] )->name('products.edit');
    Route::post('/update',[ProductController::class, 'update'] )->name('products.update');
    Route::delete('/{id}/delete',[ProductController::class, 'delete'] )->name('products.delete');
});

Route::prefix('admin/employees')->group(function () {
    Route::get('/',[EmployeeController::class, 'index'] )->name('employees.index');
    Route::get('/create',[EmployeeController::class, 'create'] )->name('employees.create');
    Route::post('/store',[EmployeeController::class, 'store'] )->name('employees.store');
    Route::get('/{id}/edit',[EmployeeController::class, 'edit'] )->name('employees.edit');
    Route::post('/update',[EmployeeController::class, 'update'] )->name('employees.update');
    Route::delete('/{id}/delete',[EmployeeController::class, 'delete'] )->name('employees.delete');
});

Route::prefix('admin/managers')->group(function () {
    Route::get('/',[ManagerController::class, 'index'] )->name('managers.index');
    Route::get('/create',[ManagerController::class, 'create'] )->name('managers.create');
    Route::post('/store',[ManagerController::class, 'store'] )->name('managers.store');
    Route::get('/{id}/edit',[ManagerController::class, 'edit'] )->name('managers.edit');
    Route::post('/update',[ManagerController::class, 'update'] )->name('managers.update');
    Route::delete('/{id}/delete',[ManagerController::class, 'delete'] )->name('managers.delete');
});


Route::prefix('admin/payrolls')->group(function () {
    Route::get('/{id}/index',[PayrollController::class, 'index'] )->name('payrolls.index');
    Route::get('/create',[PayrollController::class, 'create'] )->name('payrolls.create');
    Route::post('/store',[PayrollController::class, 'store'] )->name('payrolls.store');

});
