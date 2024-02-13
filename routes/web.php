<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Auth\RegisterController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_user', [LoginController::class, 'login_user'])->name('login_user');
Route::get('/logout_user', [LoginController::class, 'logout_user'])->name('logout_user');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/register_user', [RegisterController::class, 'register_user'])->name('home');

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
]);

Route::get('/departments', [DepartmentController::class, 'index'])->name('index');
Route::get('/departments/{id}', [DepartmentController::class, 'view_department'])->name('view_department');
Route::post('/create', [DepartmentController::class, 'create'])->name('create');
Route::post('/department/store', [DepartmentController::class, 'store'])->name('store');
Route::post('/department/update/{id}', [DepartmentController::class, 'update'])->name('update');
Route::post('/department/delete/{id}', [DepartmentController::class, 'delete'])->name('delete');
Route::post('/department/delete/{id}', [DepartmentController::class, 'delete'])->name('delete');

// Route::post('/department/store', [DepartmentController::class, 'store'])->name('department.store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'logout'])->name('logout');

Route::get('/employees', [EmployeeController::class, 'index']);
