<?php

use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;


// Reports
Route::prefix('staff')->group(function () {
    Route::get('daily-report', [StaffController::class, 'getDailyReportPage'])->name('reports.view.page');
    Route::post('report', [StaffController::class, 'submitReport'])->name('reports.submit');
});
