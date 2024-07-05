<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student; // Adjust this based on your model name and namespace

class StudentAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.student-register');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the student
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Optionally, authenticate the student after registration
        // auth()->login($student);

        // Redirect to a success page or dashboard
        return redirect()->route('student.dashboard'); // Example route name for student dashboard
    }
}

