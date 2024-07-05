<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        // Return the admin dashboard view
        return view('admin.index');
    }

    // public function show($id)
    // {
    //     // Show class request details
    //     $classRequest = ClassRequest::findOrFail($id);
    //     return view('admin.show', compact('classRequest'));
    // }

    // public function assignTeacher(Request $request, $id)
    // {
    //     // Logic to assign teacher to a class request
    // }

    // public function reject($id)
    // {
    //     // Logic to reject a class request
    // }

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

        return redirect()->route('teacherDashboard')->with('status', 'Teacher created successfully!');
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

        return redirect()->route('studentDashboard')->with('status', 'Teacher created successfully!');
    }
}
