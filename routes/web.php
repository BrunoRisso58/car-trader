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
Route::prefix('users')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('/', 'index')->name('users.index');
        Route::get('/{id}', 'show')->name('user.show');
        Route::post('/add-user', 'store')->name('user.store');
    }
);
Route::get('/sign-up', [UserController::class, 'create'])->name('user.signUp');