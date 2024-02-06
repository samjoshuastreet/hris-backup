<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('index');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
]);

Route::get('/department', [DepartmentController::class, 'index'])->name('index');
Route::post('/department/store', [DepartmentController::class, 'store'])->name('store');
Route::post('/department/update/{id}', [DepartmentController::class, 'update'])->name('update');
Route::post('/department/delete/{id}',[ DepartmentController::class, 'delete'])->name('delete');

// Route::post('/department/store', [DepartmentController::class, 'store'])->name('department.store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'logout'])->name('logout');
