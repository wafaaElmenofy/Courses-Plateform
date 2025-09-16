<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;


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
Route::get('/courses', [EnrollmentController::class, 'index'])->name('courses.index');
Route::post('/courses/{course_id}/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');
Route::post('/courses/{course_id}/unenroll', [EnrollmentController::class, 'unenroll'])->name('courses.unenroll');
Route::get('/my-courses', [EnrollmentController::class, 'myCourses'])->name('courses.my');
//crud
Route::resource('courses', CourseController::class);
