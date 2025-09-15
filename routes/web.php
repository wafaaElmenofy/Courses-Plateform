<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AutherController;


Route::get('/register', [AutherController::class, 'showRegister']); 
Route::post('/register', [AutherController::class, 'register']);   

Route::get('/login', [AutherController::class, 'showLogin']);      
Route::post('/login', [AutherController::class, 'login']);        

Route::get('/logout', [AutherController::class, 'logout']);        


// Route::get('/student/dashboard', [DashboardController::class, 'student'])->middleware('checkrole:student');
// Route::get('/instructor/dashboard', [DashboardController::class, 'instructor'])->middleware('checkrole:instructor');
