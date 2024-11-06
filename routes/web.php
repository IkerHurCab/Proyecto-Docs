<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\CanAccessDepartment;
use App\Http\Middleware\Admin;

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
    Route::delete('/documents/{id}', [DocumentController::class, 'destroy'])->name('documents.destroy');
    
    Route::middleware([CanAccessDepartment::class])->group(function () {
        Route::get('/department/{id}', [DepartmentController::class, 'show'])->name('department.show');
    });

    Route::middleware([Admin::class])->group(function () {
        Route::get('/controlpanel', function() {
            return view('controlPanel');
        })->name("admin");

        Route::get('/controlpanel/employees', function() {
            return view('employees');
        })->name("employeesAdmin");

        Route::get('/controlpanel/documents', function() {
            return view('documents');
        })->name("documentsAdmin");

        Route::get('/controlpanel/departments', function() {
            return view('departments');
        })->name("departmentsAdmin");

        Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
        Route::put('/employees/{id}', [EmployeeController::class, 'promote'])->name('employees.promote');
        Route::put('/employees/{id}/department/{departmentId}', [EmployeeController::class, 'setDepartment'])->name('employees.setDepartment');
        
        Route::delete('/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
        Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    });
});




//PARA LA BASE DE DATOS

//registro
Route::post('/register', [RegisterController::class, 'register']);

//login
Route::post('/login', [LoginController::class, 'login']);

