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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModsController;
use App\Http\Controllers\SubmissionsController;
use App\Http\Controllers\UsersController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('/reset-password', [LoginController::class, 'resetPassword'])->name('resetPassword');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/mods', [ModsController::class, 'index'])->name('mods.index');

    Route::get('/submissions', [SubmissionsController::class, 'index'])->name('submissions.index');
    Route::get('/submissions/datatables', [SubmissionsController::class, 'datatables'])->name('submissions.datatables');
    Route::get('/submissions/details/{submission}', [SubmissionsController::class, 'details'])->name('submissions.details');

    Route::middleware(['admin'])->group(function () {
        Route::get('/users', [UsersController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
        Route::get('/users/edit/{user}', [UsersController::class, 'edit'])->name('users.edit');
        Route::get('/users/delete/{user}', [UsersController::class, 'delete'])->name('users.delete');
        Route::post('/users/create', [UsersController::class, 'createPost'])->name('users.createPost');
        Route::post('/users/edit/{user}', [UsersController::class, 'editPost'])->name('users.editPost');
        Route::post('/users/changepassword/{user}', [UsersController::class, 'changePassword'])->name('users.changepassword');
    });
});
