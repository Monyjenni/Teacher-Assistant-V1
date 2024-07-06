<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Class Request Details') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold">Class Request: {{ $classRequest->name }}</h1>

                <p><strong>Description:</strong> {{ $classRequest->description }}</p>

                <p><strong>Student:</strong> {{ $studentName }}</p>

                <p><strong>Status:</strong> {{ ucfirst($classRequest->status) }}</p>

                @if ($classRequest->status === 'pending')
                    <form action="{{ route('admin.assignTeacher', $classRequest->id) }}" method="POST">
                        @csrf
                        <div class="mt-4">
                            <label for="teacher_id" class="block font-medium text-sm text-gray-700">Assign Teacher</label>
                            <select name="teacher_id" id="teacher_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->first_name }} {{ $teacher->last_name }}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Assign Teacher
                        </button>
                    </form>
                @endif

                <div class="mt-4">
                    <a href="{{ route('admin.index') }}" class="text-blue-500 hover:text-blue-700">Back to Admin Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
