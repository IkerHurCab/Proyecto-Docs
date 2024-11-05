<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentController;

//VISTAS DE LA WEB (GLOBALES)
Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/login', function() {
    return view('login');
})->name("login");

Route::get('/register', function() {
    return view('register');
})->name("register");

Route::get('/logout', function() {
    return view('logout');
})->name("logout");


//VISTAS DE LA WEB (AUTH)

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('/home', [HomeController::class, 'index'])->name('homeAuth');

    Route::get('/profile', function() {
        return view('profile');
    })->name("profile");

    Route::get('/department/{id}', [DepartmentController::class, 'show'])->name('department.show');
    Route::post('/departments/{id}/documents/upload', [DocumentController::class, 'upload'])->name('documents.upload');
    
});

//PARA LA BASE DE DATOS

//registro
Route::post('/register', [RegisterController::class, 'register']);

//login
Route::post('/login', [LoginController::class, 'login']);

