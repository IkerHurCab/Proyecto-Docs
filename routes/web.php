<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

//views
Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/login', function() {
    return view('login');
})->name("login");

Route::get('/register', function() {
    return view('register');
})->name("register");

//BBDD

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
