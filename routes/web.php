<?php

use App\Http\Controllers\auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\car\CarController;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\dashboard\Dashboard;

Route::get('/', [Dashboard::class, 'index'])->middleware('auth')->name('main');

Route::group(['prefix' => 'car', 'middleware' => 'auth'], function () {
  Route::get('/', [CarController::class, 'index'])->name('car');
  Route::get('/new', [CarController::class, 'create'])->name('car.new');
  Route::get('/{id}/edit', [CarController::class, 'edit'])->name('car.edit');
  Route::get('/{id}/edit/status', [CarController::class, 'editStatus'])->name('car.edit.status');
  Route::post('/{id}/update/status', [CarController::class, 'updateStatus'])->name('car.update.status');
  Route::post('/{id}/update', [CarController::class, 'update'])->name('car.update');
  Route::post('/store', [CarController::class, 'store'])->name('car.store');
  Route::post('/{id}/delete', [CarController::class, 'delete'])->name('car.delete');
});

Route::group(['prefix' => 'customer', 'middleware' => 'auth'], function () {
  Route::get('/', [CustomerController::class, 'index'])->name('customer');
  Route::get('/new', [CustomerController::class, 'create'])->name('customer.new');
  Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
  Route::post('/{id}/update', [CustomerController::class, 'update'])->name('customer.update');
  Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
  Route::post('/{id}/delete', [CustomerController::class, 'delete'])->name('customer.delete');
});

Route::prefix('auth')->group(function () {
  Route::get('/login', [AuthController::class, 'loginIndex'])->name('login');
  Route::get('/register', [AuthController::class, 'registerIndex'])->name('register');
  Route::post('/register', [AuthController::class, 'register'])->name('register.store');
  Route::post('/login', [AuthController::class, 'login'])->name('login.store');
  Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});
