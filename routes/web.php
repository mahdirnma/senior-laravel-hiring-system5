<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;
Route::middleware('guest')->group(function () {
    Route::get('/managerLogin',[AuthController::class,'managerLoginForm'])->name('manager.login.form');
    Route::post('/managerLogin',[AuthController::class,'managerLogin'])->name('manager.login');
    Route::get('/applicantLogin',[AuthController::class,'applicantLoginForm'])->name('applicant.login.form');
    Route::post('/applicantLogin',[AuthController::class,'applicantLogin'])->name('applicant.login');
});
Route::middleware('auth:managers')->group(function () {
    Route::get('/managerDashboard',[ManagerController::class,'dashboard'])->name('manager.dashboard');
});
