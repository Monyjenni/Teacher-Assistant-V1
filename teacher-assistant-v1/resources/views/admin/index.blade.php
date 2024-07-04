@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
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
                            <a href="{{ route('admin.show', $classRequest->id) }}" class="btn btn-info">View</a>
                            <form action="{{ route('admin.reject', $classRequest->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
