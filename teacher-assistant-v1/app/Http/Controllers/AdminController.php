<?php

namespace App\Http\Controllers;

use App\Models\ClassRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $classRequests = ClassRequest::all();
        return view('admin.index', compact('classRequests'));
    }

    public function show(ClassRequest $classRequest)
    {
        $teachers = Teacher::all();
        return view('admin.show', compact('classRequest', 'teachers'));
    }

    public function assignTeacher(Request $request, ClassRequest $classRequest)
    {
        $classRequest->teacher_id = $request->teacher_id;
        $classRequest->status = 'approved';
        $classRequest->save();

        // send notification to teacher

        return redirect()->route('admin.index')
                        ->with('success', 'Teacher assigned successfully.');
    }

    public function reject(ClassRequest $classRequest)
    {
        $classRequest->status = 'rejected';
        $classRequest->save();

        // send notification to student

        return redirect()->route('admin.index')
                        ->with('success', 'Class request rejected.');
    }
}

