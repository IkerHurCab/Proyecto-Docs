<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

//VISTAS DE LA WEB
Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/login', function() {
    return view('login');
})->name("login");

Route::get('/register', function() {
    return view('register');
})->name("register");

//PARA LA BASE DE DATOS

//registro
Route::post('/register', [RegisterController::class, 'register']);

//login
Route::post('/login', [LoginController::class, 'login']);

