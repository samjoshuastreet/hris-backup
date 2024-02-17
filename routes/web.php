<?php

use App\Http\Controllers\AttendanceController;
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
Route::get('/logout_user', [LoginController::class, 'logout_user'])->name('logout_user');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/register_user', [RegisterController::class, 'register_user'])->name('home');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
]);

Route::get('/departments_manager', [DepartmentController::class, 'index'])->name('index');
Route::get('/departments/{id}', [DepartmentController::class, 'view_department'])->name('view_department');
Route::post('/department/store', [DepartmentController::class, 'store'])->name('store');
Route::post('/department/update/{id}', [DepartmentController::class, 'update'])->name('update');
Route::post('/department/delete/{id}', [DepartmentController::class, 'delete'])->name('delete');
Route::post('/department/delete/{id}', [DepartmentController::class, 'delete'])->name('delete');
// Department Ajax
Route::get('/department/create', [DepartmentController::class, 'create'])->name('create');
Route::get('/department/reload', [DepartmentController::class, 'render_list'])->name('render_list');
Route::get('/department/update', [DepartmentController::class, 'update'])->name('update');
Route::get('/department/delete_record/{id}', [DepartmentController::class, 'delete_record'])->name('delete_record');
Route::get('/department/get_record/{id}', [DepartmentController::class, 'get_record'])->name('get_record');

// Route::post('/department/store', [DepartmentController::class, 'store'])->name('department.store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'logout'])->name('logout');

Route::get('/employee', [EmployeeController::class, 'index'])->name('index');
Route::get('/employee/reload', [EmployeeController::class, 'render_employee_list'])->name('render_employee_list');
Route::get('/firstValidation/employee', [EmployeeController::class, 'firstValidation'])->name('firstValidation');
Route::get('/thirdValidation/employee', [EmployeeController::class, 'thirdValidation'])->name('thirdValidation');
Route::get('/fourthValidation/employee', [EmployeeController::class, 'fourthValidation'])->name('fourthValidation');
Route::get('/employees', [EmployeeController::class, 'index']);

Route::get('/attendance', [AttendanceController::class, 'index']);
