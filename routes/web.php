<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'loginform']);

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/signup', [AuthController::class, 'signupform']);

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');

Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/product/{id}', [ProductController::class, 'product'])->name('product');


