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

// users (only permission 1)
Route::controller(UserController::class)->middleware('auth')->group(function () {
    Route::get('users/', 'index')->middleware('UserPagesPermission')->name('users.index');
    Route::get('users/{id}', 'show')->middleware('VerifyLoggedUser')->name('user.show');
    Route::get('users/edit/{id}', 'edit')->middleware('VerifyLoggedUser')->name('user.edit');
    Route::put('users/update/{id}', 'update')->middleware('VerifyLoggedUser')->name('user.update');
});

// sign up / sign in
Route::controller(UserController::class)->group(function () {
    Route::get('/sign-up', 'create')->name('signup');
    Route::post('users/add-user', 'store')->name('user.store');
    Route::get('login/', 'loginForm')->name('loginForm');
    Route::post('login/', 'login')->name('login');
    Route::post('logout/', 'logout')->name('logout');
});

// cars
Route::controller(CarController::class)->group(function () {
    Route::get('/', 'index')->name('cars.index');
    Route::get('cars/add', 'create')->middleware('auth')->name('car.create');
    Route::post('cars/store', 'store')->middleware('auth')->name('car.store');
    Route::get('car/{id}', 'show')->name('car.show');
    Route::get('cars/my-list', 'myList')->middleware('auth')->name('cars.list');
});

// redirects to / when route does not exist
Route::fallback(function () {
    return redirect()->route('cars.index');
});