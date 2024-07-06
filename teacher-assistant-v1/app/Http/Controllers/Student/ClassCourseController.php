<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassCourse;

class ClassCourseController extends Controller
{
    public function index()
    {
        $classes = ClassCourse::all();
        return view('student.classes.index', compact('classes'));
    }

    public function create()
    {
        return view('student.classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        ClassCourse::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'pending', // Default status for new classes
            'student_id' => auth()->id(),
        ]);

        return redirect()->route('student.classes.index')->with('success', 'Class created successfully.');
    }

    public function show(ClassCourse $class)
    {
        return view('student.classes.show', compact('class'));
    }

    public function edit(ClassCourse $class)
    {
        return view('student.classes.edit', compact('class'));
    }

    public function update(Request $request, ClassCourse $class)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $class->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('student.classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy(ClassCourse $class)
    {
        $class->delete();
        return redirect()->route('student.classes.index')->with('success', 'Class deleted successfully.');
    }
}
