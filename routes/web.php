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
    Route::resource('/jobs', JobController::class)->except('index');
    Route::get('/manager/applies',[ManagerController::class,'applies'])->name('manager.applies');
    Route::post('/managers/logout',[AuthController::class,'managerLogout'])->name('manager.logout');
});
Route::middleware('auth:applicants')->group(function () {
    Route::get('/applicants/dashboard',[ApplicantController::class,'dashboard'])->name('applicant.dashboard');
    Route::get('/jobs/{job}/apply',[JobController::class,'applyForm'])->name('job.apply.form');
    Route::post('/jobs/{job}/apply',[JobController::class,'apply'])->name('job.apply');

    Route::post('/applicants/logout',[AuthController::class,'applicantLogout'])->name('applicant.logout');
});
Route::middleware('auth:applicants,managers')->group(function () {
    Route::resource('/jobs', JobController::class)->only('index');
});
