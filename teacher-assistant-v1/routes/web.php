<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\Student\ClassCourseController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Models\ClassCourse;
use App\Mail\ClassRequestMail;

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



Route::prefix('student')->group(function () {
    Route::get('classes', [ClassCourseController::class, 'index'])->name('student.classes.index');
    Route::get('classes/create', [ClassCourseController::class, 'create'])->name('student.classes.create');
    Route::post('classes', [ClassCourseController::class, 'store'])->name('student.classes.store');
    Route::get('classes/{class}', [ClassCourseController::class, 'show'])->name('student.classes.show');
    Route::get('classes/{class}/edit', [ClassCourseController::class, 'edit'])->name('student.classes.edit');
    Route::put('classes/{class}', [ClassCourseController::class, 'update'])->name('student.classes.update');
    Route::delete('classes/{class}', [ClassCourseController::class, 'destroy'])->name('student.classes.destroy');
});

Route::get("/email-1", function() {
    $name = "Admin";
    $from = "Teacher Assistant";
    $class = ClassCourse::latest()->first(); // Get the latest created class

    if (!$class) {
        return redirect()->route('student.classes.index')->with('error', 'No classes found.');
    }

    // Send email
    Mail::to("chansovanmonyyoeun03@gmail.com")->send(new TestMail(compact("name", "from"), $class));

    // Redirect to the index route of classes
    return redirect()->route('student.classes.index')->with('success', 'Email sent successfully!');
});


Route::resource('classRequests', ClassRequestController::class);

require __DIR__.'/auth.php';

