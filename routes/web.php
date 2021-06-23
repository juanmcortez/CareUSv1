<?php

use App\Http\Controllers\Users\UserController;
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

require __DIR__ . '/auth.php';

// Protected routes with authorization
Route::middleware(['auth'])->group(function () {

    /* ***** Patient routes ***** */
    Route::prefix('patients')->name('patients.')->group(function () {
        Route::get('list', function () {
            return view('pages.patients.index');
        })->name('list');
    });

    /* ***** User routes ***** */
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('profile', [UserController::class, 'index'])->name('profile');
        Route::put('profile', [UserController::class, 'update'])->name('profile.update');
    });


    /* **** Temp routes ***** */
    Route::prefix('codes')->name('codes.')->group(function () {
        Route::get('/list', [UserController::class, 'index'])->name('index');
    });

    Route::prefix('insurances')->name('insurances.')->group(function () {
        Route::get('/list', [UserController::class, 'index'])->name('index');
    });

    Route::prefix('practice')->name('practice.')->group(function () {
        Route::get('/settings', [UserController::class, 'index'])->name('index');
    });

    Route::prefix('system')->name('careus.')->group(function () {
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/lists', [UserController::class, 'index'])->name('lists');
        });
    });

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    /* **** Temp routes ***** */
});

// Fall back route
Route::fallback(function () {
    //
});
