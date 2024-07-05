<?php

namespace App\Http\Controllers;

use App\Models\ClassRequest;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teacher'); // Ensure only teachers can access these routes
    }

    public function index()
    {
        $classRequests = ClassRequest::where('teacher_id', auth()->id())->get();
        return view('teacher.index', compact('classRequests'));
    }

    public function accept(ClassRequest $classRequest)
    {
        $classRequest->status = 'approved';
        $classRequest->save();

        // send notification to students

        return redirect()->route('teacher.index')
            ->with('success', 'Class request accepted.');
    }

    public function reject(ClassRequest $classRequest)
    {
        $classRequest->status = 'rejected';
        $classRequest->save();

        // send notification to students

        return redirect()->route('teacher.index')
            ->with('success', 'Class request rejected.');
    }
}
