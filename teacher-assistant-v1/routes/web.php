<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


    // Admin routes here
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/classRequests/{classRequest}', [AdminController::class, 'show'])->name('admin.show');
    Route::post('/admin/classRequests/{classRequest}/assignTeacher', [AdminController::class, 'assignTeacher'])->name('admin.assignTeacher');
    Route::post('/admin/classRequests/{classRequest}/reject', [AdminController::class, 'reject'])->name('admin.reject');
    Route::get('/admin/create-teacher', [AdminController::class, 'createTeacherForm'])->name('admin.createTeacherForm');
    Route::post('/admin/create-teacher', [AdminController::class, 'createTeacher'])->name('admin.createTeacher');


    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
    Route::post('/teacher/classRequests/{classRequest}/accept', [TeacherController::class, 'accept'])->name('teacher.accept');
    Route::post('/teacher/classRequests/{classRequest}/reject', [TeacherController::class, 'reject'])->name('teacher.reject');


Route::resource('classRequests', ClassRequestController::class);

require __DIR__.'/auth.php';

