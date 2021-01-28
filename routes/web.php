<?php

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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    ExportController,
    LoginController,
    ModsController,
    SettingsController,
    SubmissionsController,
    UsersController
};

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'auth'])->name('auth');
    Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/reset-password', [LoginController::class, 'resetPassword'])->name('resetPassword');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/mods/{submissionId}', [ModsController::class, 'index'])->name('mods.index');
    Route::prefix('settings')->group(function () {
        Route::get('/{user}', [SettingsController::class, 'index'])->name('settings.index');
        Route::post('/environment/{user}', [SettingsController::class, 'saveEnvironment'])->name('settings.saveEnvironment');
        Route::post('/password/{user}', [SettingsController::class, 'savePassword'])->name('settings.savePassword');
    });
    Route::prefix('submissions')->group(function () {
        Route::get('/', [SubmissionsController::class, 'index'])->name('submissions.index');
        Route::get('/datatables', [SubmissionsController::class, 'datatables'])->name('submissions.datatables');
        Route::get('/details/{submissionId}', [SubmissionsController::class, 'details'])->name('submissions.details');
        Route::get('/filter/{outcomeTypeId}', [SubmissionsController::class, 'filter'])->name('submissions.filter');
    });
    Route::prefix('export')->group(function () {
        Route::get('/pdf/{submissionId}', [ExportController::class, 'pdf'])->name('export.pdf');
    });
    Route::middleware(['admin'])->prefix('users')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/create', [UsersController::class, 'createPost'])->name('users.createPost');
        Route::get('/edit/{user}', [UsersController::class, 'edit'])->name('users.edit');
        Route::post('/edit/{user}', [UsersController::class, 'editPost'])->name('users.editPost');
        Route::get('/delete/{user}', [UsersController::class, 'delete'])->name('users.delete');
        Route::post('/password/{user}', [UsersController::class, 'savePassword'])->name('users.savePassword');
    });
});
