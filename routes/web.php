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
    LoginController,
    ModsController,
    SettingsController,
    SubmissionsController,
    UsersController
};

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/reset-password', [LoginController::class, 'resetPassword'])->name('resetPassword');
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/mods/{submissionId}', [ModsController::class, 'index'])->name('mods.index');
    Route::prefix('settings')->group(function () {
        Route::get('/{user}', [SettingsController::class, 'index'])->name('settings.index');
        Route::post('/{user}', [SettingsController::class, 'save'])->name('settings.save');
    });
    Route::prefix('submissions')->group(function () {
        Route::get('/', [SubmissionsController::class, 'index'])->name('submissions.index');
        Route::get('/datatables', [SubmissionsController::class, 'datatables'])->name('submissions.datatables');
        Route::get('/details/{submissionId}', [SubmissionsController::class, 'details'])->name('submissions.details');
    });
    Route::middleware(['admin'])->prefix('users')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/create', [UsersController::class, 'createPost'])->name('users.createPost');
        Route::get('/edit/{user}', [UsersController::class, 'edit'])->name('users.edit');
        Route::post('/edit/{user}', [UsersController::class, 'editPost'])->name('users.editPost');
        Route::get('/delete/{user}', [UsersController::class, 'delete'])->name('users.delete');
        Route::post('/changepassword/{user}', [UsersController::class, 'changePassword'])->name('users.changepassword');
    });
});
