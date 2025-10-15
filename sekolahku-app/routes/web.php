<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\AdminController;

Route::resource('users', UserController::class);
Route::resource('courses', CourseController::class);
Route::resource('user-courses', UserCourseController::class);

// Route::get('/', function () {
//     return redirect()->route('users.index');
// });

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth', 'is_admin');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::resource('user-courses', UserCourseController::class);
