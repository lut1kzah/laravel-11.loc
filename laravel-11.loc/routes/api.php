<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Маршруты на регистрацию, аутентификацию и выход
use \App\Http\Controllers\Api\AuthController;
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

// Маршруты для категории
use \App\Http\Controllers\Api\CategoryController;

/*
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::middleware('auth:api')->group(function () {
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

});
*/

Route::middleware('auth:api')->apiResource('categories', CategoryController::class)->except(['index', 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
