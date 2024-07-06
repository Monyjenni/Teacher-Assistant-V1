<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold mb-4">Class Details: {{ $class->name }}</h1>

                <div class="mb-4">
                    <p class="text-lg"><strong>Description:</strong> {{ $class->description }}</p>
                </div>

                <a href="{{ route('student.classes.edit', $class->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                    Edit Class
                </a>
                <form action="{{ route('student.classes.destroy', $class->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block ml-2" onclick="return confirm('Are you sure you want to delete this class?')">Delete Class</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
