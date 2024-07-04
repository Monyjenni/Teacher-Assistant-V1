<?php

namespace App\Http\Controllers;

use App\Models\ClassRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ClassRequestNotification;

class ClassRequestController extends Controller
{
    public function index()
    {
        $classRequests = ClassRequest::all();
        return view('classRequests.index', compact('classRequests'));
    }

    public function create()
    {
        return view('classRequests.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required',
            // other validations
        ]);

        $classRequest = ClassRequest::create($request->all());

        // Send notification to admin
        Notification::route('mail', 'admin@example.com')
                    ->notify(new ClassRequestNotification($classRequest));

        return redirect()->route('classRequests.index')
                        ->with('success', 'Class request created successfully.');
    }

    public function show(ClassRequest $classRequest)
    {
        return view('classRequests.show', compact('classRequest'));
    }

    public function edit(ClassRequest $classRequest)
    {
        return view('classRequests.edit', compact('classRequest'));
    }

    public function update(Request $request, ClassRequest $classRequest)
    {
        $request->validate([
            'class_name' => 'required',
            // other validations
        ]);

        $classRequest->update($request->all());

        // Send notification to admin
        Notification::route('mail', 'admin@example.com')
                    ->notify(new ClassRequestNotification($classRequest));

        return redirect()->route('classRequests.index')
                        ->with('success', 'Class request updated successfully.');
    }

    public function destroy(ClassRequest $classRequest)
    {
        $classRequest->delete();

        // Send notification to admin
        Notification::route('mail', 'admin@example.com')
                    ->notify(new ClassRequestNotification($classRequest));

        return redirect()->route('classRequests.index')
                        ->with('success', 'Class request deleted successfully.');
    }
}
