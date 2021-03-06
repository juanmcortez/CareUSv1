<?php

use App\Http\Controllers\Appointments\AppointmentController;
use App\Http\Controllers\Billings\BillingController;
use App\Http\Controllers\Dashboard\StatsController;
use App\Http\Controllers\Eligibilities\EligibilityController;
use App\Http\Controllers\Insurances\CompanyController;
use App\Http\Controllers\Patients\PatientController;
use App\Http\Controllers\Practices\CodeController;
use App\Http\Controllers\Practices\PracticeController;
use App\Http\Controllers\Reports\ReportController;
use App\Http\Controllers\System\SettingsController;
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
Route::middleware(['verified', 'auth'])->group(function () {

    /* ***** Stats / Dashboard ***** */
    Route::prefix('')->name('dashboard.')->group(function () {
        Route::get('', [StatsController::class, 'index'])->name('index');
    });

    /* ***** Patient routes ***** */
    Route::prefix('patient')->name('patient.')->group(function () {
        Route::get('list', [PatientController::class, 'index'])->name('list');
        Route::get('{patient}/ledger', [PatientController::class, 'show'])->name('show');
        Route::get('{patient}/ledger/detail', [PatientController::class, 'detail'])->name('detail');
        Route::get('{patient}/ledger/edit', [PatientController::class, 'edit'])->name('edit');
        Route::patch('{patient}/ledger/edit', [PatientController::class, 'update'])->name('update');
        Route::delete('{patient}/remove', [PatientController::class, 'destroy'])->name('delete');
    });

    /* ***** Billing routes ***** */
    Route::prefix('billing')->name('billing.')->group(function () {
        Route::get('manager', [BillingController::class, 'index'])->name('index');
    });

    /* ***** Eligiblity routes ***** */
    Route::prefix('eligiblity')->name('eligiblity.')->group(function () {
        Route::get('dashboard', [EligibilityController::class, 'index'])->name('index');
    });

    /* ***** Appointment routes ***** */
    Route::prefix('appointment')->name('appointment.')->group(function () {
        Route::get('list', [AppointmentController::class, 'index'])->name('index');
    });

    /* ***** Reports routes ***** */
    Route::prefix('report')->name('report.')->group(function () {
        Route::get('payments-adjustments-charges/date-entered', [ReportController::class, 'index'])->name('index');
    });

    /* ***** Practice routes ***** */
    Route::prefix('practice')->name('practice.')->group(function () {
        Route::get('setting', [PracticeController::class, 'index'])->name('index');
    });

    /* ***** Insurance routes ***** */
    Route::prefix('insurance')->name('insurance.')->group(function () {
        Route::get('list', [CompanyController::class, 'index'])->name('index');
    });

    /* ***** User routes ***** */
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('profile', [UserController::class, 'index'])->name('profile');
        Route::put('profile', [UserController::class, 'update'])->name('profile.update');
    });

    /* ***** Codes routes ***** */
    Route::prefix('code')->name('code.')->group(function () {
        Route::get('master/list', [CodeController::class, 'index'])->name('index');
    });

    /* **** CareUS routes ***** */
    Route::prefix('system')->name('careus.')->group(function () {
        Route::prefix('setting')->name('setting.')->group(function () {
            Route::get('', [SettingsController::class, 'index'])->name('list');
        });
    });
});
