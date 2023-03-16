<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/login', [AuthController::class, 'loginform']);

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/signup', [AuthController::class, 'signupform']);

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');


