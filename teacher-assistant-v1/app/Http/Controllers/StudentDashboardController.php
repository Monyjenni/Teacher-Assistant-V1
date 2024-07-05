<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    /**
     * Display the student dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('student.studentDashboard');
    }
}
