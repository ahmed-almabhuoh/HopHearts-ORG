<?php

use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;


// Reports
Route::prefix('staff')->group(function () {
    Route::get('daily-report', [StaffController::class, 'getDailyReportPage'])
        ->name('reports.view.page')
        ->middleware('throttle:10,1');

    Route::post('report', [StaffController::class, 'submitReport'])
        ->middleware('throttle:5,1')
        ->name('reports.submit');
});
