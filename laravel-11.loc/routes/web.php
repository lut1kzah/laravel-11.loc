<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Web\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/login', [AuthController::class, 'showFormLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showFormRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:web');

// Маршруты для категории
use \App\Http\Controllers\Web\CategoryController;

/*
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{categories}', [CategoryController::class, 'show'])->name('categories.show');
Route::middleware(['auth:web'])->group(function () {
   Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
   Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
   Route::get('/categories/{categories}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
   Route::patch('/categories/{categories}', [CategoryController::class, 'update'])->name('categories.update');
   Route::delete('/categories/{categories}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
*/

Route::middleware(['auth:api'])->resource('categories', CategoryController::class)->except(['index', 'show']);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{categories}', [CategoryController::class, 'show'])->name('categories.show');
