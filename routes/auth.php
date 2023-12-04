<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerifyCodeController;

Route::post('logout', [AuthController::class, 'logout']);
Route::post('send-sms-code', [AuthController::class, 'sendSMSCode']);
Route::post('refresh-token', [AuthController::class, 'refreshToken']);
Route::post('verify-sms-code', [VerifyCodeController::class, 'verifySMSCode']);
Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');
