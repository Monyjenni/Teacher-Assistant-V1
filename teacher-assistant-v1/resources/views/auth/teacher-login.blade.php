<!-- resources/views/auth/teacher-login.blade.php -->

<x-guest-layout>
        <x-slot name="logo">
            <a href="/">
                {{ __('Logo') }}
            </a>
        </x-slot>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
            {{ __('Teacher Login') }}
        </h2>

        <form method="POST" action="{{ route('teacher.login') }}">
            @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>

        </form>
</x-guest-layout>

