<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

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

// users
Route::controller(UserController::class)->middleware(['auth', 'permission'])->group(function () {
    Route::get('users/', 'index')->name('users.index');
    Route::get('users/{id}', 'show')->name('user.show');
    Route::get('users/edit/{id}', 'edit')->name('user.edit');
    Route::put('users/update/{id}', 'update')->name('user.update');
});

// sign up / sign in
Route::controller(UserController::class)->group(function () {
    Route::get('/sign-up', 'create')->name('signup');
    Route::post('users/add-user', 'store')->name('user.store');
    Route::get('login/', 'loginForm')->name('loginForm');
    Route::post('login/', 'login')->name('login');
});

// cars
Route::controller(CarController::class)->group(function () {
    Route::get('cars/', 'index')->name('cars.index');
    Route::get('cars/add', 'create')->name('car.create');
    Route::post('cars/store', 'store')->name('car.store');
});