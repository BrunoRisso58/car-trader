<?php

use App\Http\Controllers\UserController;
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
Route::controller(UserController::class)->group(function () {
        Route::get('users/', 'index')->name('users.index');
        Route::get('users/{id}', 'show')->name('user.show');
        Route::post('users/add-user', 'store')->name('user.store');
        Route::get('/sign-up', 'create')->name('user.signUp');
        Route::get('users/edit/{id}', 'edit')->name('user.edit');
        Route::put('users/update/{id}', 'update')->name('user.update');
    }
);