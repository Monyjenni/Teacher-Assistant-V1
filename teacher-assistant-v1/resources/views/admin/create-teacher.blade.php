<!-- resources/views/admin/create-teacher.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Teacher') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>

                            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.createTeacher') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="first_name" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                            <input type="password" id="password" name="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password:</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Teacher
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
