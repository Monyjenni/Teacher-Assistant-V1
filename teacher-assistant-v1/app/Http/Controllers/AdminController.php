<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\ClassRequest;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        // Return the admin dashboard view
        return view('admin.index');
    }


    public function createTeacherForm()
    {
        // Return the view to create a teacher
        return view('admin.create-teacher');
    }

    public function createTeacher(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_teacher' => true,
        ]);
        $user->is_teacher = true;

        return redirect()->route('dashboard')->with('status', 'Teacher created successfully!');
    }


    public function createStudentForm()
    {
        return view('admin.create-student');
    }

    public function createStudent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_student' => true,
        ]);
        $user->is_student = true;

        return redirect()->route('dashboard')->with('status', 'Student created successfully!');
    }

    public function show(ClassRequest $classRequest)
    {
        $studentName = $classRequest->student->name;
        $teacherName = $classRequest->teacher ? $classRequest->teacher->name : 'Not assigned';

        return view('admin.show', [
            'classRequest' => $classRequest,
            'studentName' => $studentName,
            'teacherName' => $teacherName,
        ]);
    }

    public function assignTeacher(Request $request, ClassRequest $classRequest)
    {
        $request->validate([
            'teacher_id' => 'required|exists:users,id',
        ]);


        $classRequest->update([
            'teacher_id' => $request->teacher_id,
            'status' => 'approved',
        ]);

        return redirect()->back()->with('success', 'Teacher assigned successfully!');
    }
}
