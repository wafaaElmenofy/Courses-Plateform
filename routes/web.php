<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/courses', [EnrollmentController::class, 'index'])->name('courses.index');
Route::post('/courses/{course_id}/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');
Route::post('/courses/{course_id}/unenroll', [EnrollmentController::class, 'unenroll'])->name('courses.unenroll');
Route::get('/my-courses', [EnrollmentController::class, 'myCourses'])->name('courses.my');
//crud
Route::resource('courses', CourseController::class);
