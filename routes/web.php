<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
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

Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', [UserController::class, 'index']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware(['admin'])->group(function () {
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/users', [UsersController::class, 'index']);
Route::get('/users', [UsersController::class, 'index'])->name('users.update');
});