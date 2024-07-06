<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">{{ __("Create Teacher") }}</h2>
                    <p class="mb-4">{{ __("Add a new teacher to the system.") }}</p>
                    <a href="{{ route('admin.createTeacher') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                        {{ __("Create Teacher") }}
                    </a>
                </div>
            </div>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">{{ __("Create Student") }}</h2>
                    <p class="mb-4">{{ __("Add a new student to the system.") }}</p>
                    <a href="{{ route('admin.createStudent') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                        {{ __("Create Student") }}
                    </a>
                </div>
            </div>

        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 p-6 text-center text-gray-500">
            <p>{{ __("You are logged in") }}</p>
        </div>
    </div>
</x-app-layout>
