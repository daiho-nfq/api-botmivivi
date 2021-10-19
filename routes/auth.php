<?php

//use App\Http\Controllers\API\Auth\ForgotPasswordController;
use App\Http\Controllers\API\Auth\LoginController;
//use App\Http\Controllers\API\Auth\LogoutController;
//use App\Http\Controllers\API\Auth\RegisterController;
//use App\Http\Controllers\API\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;

//Route::post('logout', LogoutController::class)->middleware('auth:sanctum')
//    ->name('api.logout');

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', LoginController::class)->name('api.guest.login');
//    Route::post('register', RegisterController::class)->name('api.guest.register');

//    Route::post('password/forgot', ForgotPasswordController::class)->name('api.guest.password.forgot');
//    Route::post('password/reset', ResetPasswordController::class)->name('api.guest.password.reset');
});
