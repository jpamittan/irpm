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
    Route::get('/{connection}/reports/map', [ReportsController::class, 'map'])->name('api.reports.map');
});
