<?php

use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::resource('employees', EmployeeProfileController::class);
    Route::resource('schedules', ScheduleController::class);
    
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/staff', [ReportController::class, 'generateStaffReport'])->name('reports.staff');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
