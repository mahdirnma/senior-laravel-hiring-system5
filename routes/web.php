<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;
Route::middleware('guest')->group(function () {
    Route::get('/managerLogin',[AuthController::class,'managerLoginForm'])->name('manager.login.form');
    Route::post('/managerLogin',[AuthController::class,'managerLogin'])->name('manager.login');
    Route::get('/applicantLogin',[AuthController::class,'applicantLoginForm'])->name('applicant.login.form');
    Route::post('/applicantLogin',[AuthController::class,'applicantLogin'])->name('applicant.login');
});
Route::middleware('auth:managers')->group(function () {
    Route::get('/managers/dashboard',[ManagerController::class,'dashboard'])->name('manager.dashboard');
    Route::resource('/jobs', JobController::class);
    Route::post('/managers/logout',[AuthController::class,'managerLogout'])->name('manager.logout');
});
Route::middleware('auth:applicants')->group(function () {
    Route::get('/applicants/dashboard',[ApplicantController::class,'dashboard'])->name('applicant.dashboard');
    Route::post('/applicants/logout',[AuthController::class,'applicantLogout'])->name('applicant.logout');
});
