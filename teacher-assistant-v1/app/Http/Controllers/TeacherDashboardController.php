<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        // Example logic to fetch data or perform operations

        return view('teacher.dashboard'); // Assuming 'teacher.dashboard' is your blade view
    }
}

