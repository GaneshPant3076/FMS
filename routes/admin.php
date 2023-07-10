<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
Route::resource('teacher', 'User\TeacherController');
Route::resource('student', 'User\StudentController');
// Route::resource('profile', 'User\ProfileController');
Route::resource('admin', 'User\AdminController');

