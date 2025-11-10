<?php

use App\Http\Controllers\Api\ApplicantLoginController;
use App\Http\Controllers\Api\ApplyController;
use App\Http\Controllers\ApplicantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::middleware('auth:api_applicants')->as('api.')->group(function () {
    Route::post('/applies',[ApplyController::class,'index']);
});
Route::post('/applicant/login', ApplicantLoginController::class)->name('applicant.login');
