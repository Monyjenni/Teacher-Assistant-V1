@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Class Requests</h1>
        <a href="{{ route('classRequests.create') }}" class="btn btn-primary">Create New Request</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Class Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classRequests as $classRequest)
                    <tr>
                        <td>{{ $classRequest->id }}</td>
                        <td>{{ $classRequest->class_name }}</td>
                        <td>{{ $classRequest->status }}</td>
                        <td>
                            <a href="{{ route('classRequests.show', $classRequest->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('classRequests.edit', $classRequest->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('classRequests.destroy', $classRequest->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
