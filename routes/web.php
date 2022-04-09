<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/search', [MainController::class, 'search'])->name('search');
Route::get('/register', [MainController::class, 'register'])->name('register');
Route::post('/registration', [RegistrationController::class, 'register'])->name('registration');
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::post('/checklogin', [SessionController::class, 'checklogin'])->name('checklogin');
Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
Route::post('/createpost', [PostController::class, 'createpost'])->name('createpost');
