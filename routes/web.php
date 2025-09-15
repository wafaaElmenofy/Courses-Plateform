<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutherController;

// صفحات التسجيل والدخول
Route::get('/register', [AutherController::class, 'showRegister']); // يعرض صفحة Register
Route::post('/register', [AutherController::class, 'register']);    // يعالج بيانات التسجيل

Route::get('/login', [AutherController::class, 'showLogin']);      // يعرض صفحة Login
Route::post('/login', [AutherController::class, 'login']);         // يعالج بيانات الدخول

Route::get('/logout', [AutherController::class, 'logout']);        // لتسجيل الخروج

