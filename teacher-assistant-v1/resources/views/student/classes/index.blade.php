<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold">Your Classes</h1>
                    <a href="{{ route('student.classes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Class</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="table-auto w-full mt-4 border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Description</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-4 py-2">{{ $class->name }}</td>
                                    <td class="border px-4 py-2">{{ $class->description }}</td>
                                    <td class="border px-4 py-2 flex space-x-2">
                                        <a href="{{ route('student.classes.show', $class->id) }}" class="text-blue-500 hover:text-blue-700">View</a>
                                        <a href="{{ route('student.classes.edit', $class->id) }}" class="text-green-500 hover:text-green-700">Edit</a>
                                        <form action="{{ route('student.classes.destroy', $class->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if(session('success'))
                    <div class="mt-4 p-4 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
