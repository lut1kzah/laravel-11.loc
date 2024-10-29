<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//аутентификацию и выход (маршруты) + регистрация
use \App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
