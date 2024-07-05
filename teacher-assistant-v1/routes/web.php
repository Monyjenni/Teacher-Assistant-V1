<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TeacherDashboardController;


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
    Route::post('/admin/create-admin', [AdminController::class, 'createAdmin'])->name('admin.createAdmin');

    Route::post('/admin/create-student', [AdminController::class, 'createStudent'])->name('admin.createStudent');
    Route::get('/admin/create-student', [AdminController::class, 'createStudentForm'])->name('admin.createStudentForm');

    Route::get('/teacher/teacherDashboard', [TeacherDashboardController::class, 'index'])->name('teacher.teacherDashboard');
    Route::get('/student/studentDashboard', [StudentDashboardController::class, 'index'])->name('student.studentDashboard');




Route::resource('classRequests', ClassRequestController::class);

require __DIR__.'/auth.php';

