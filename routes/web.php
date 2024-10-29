<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Web\AuthController;
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/register', [AuthController::class, 'showFormRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'ShowFormLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:web');