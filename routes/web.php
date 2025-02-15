<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/appointment', [RecordController::class, 'index'])->name('appointment');
Route::get('/appointment/{id}', [RecordController::class, 'show'])->name('record.show');
Route::post('/record', [RecordController::class, 'store'])->name('record.store');

Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware(['admin'])->group(function () {
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/{id}/update-status', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit'); 
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
});