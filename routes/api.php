<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ReportsController
};

Route::middleware([])->group(function () {
    Route::get('/{connection}/reports/line', [ReportsController::class, 'line'])->name('api.reports.line');
    Route::get('/{connection}/reports/bar', [ReportsController::class, 'bar'])->name('api.reports.bar');
    Route::get('/{connection}/reports/map', [ReportsController::class, 'map'])->name('api.reports.map');
});
