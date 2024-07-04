<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'phone_number' => '1234567890',
            'university_name' => 'University',
            'faculty' => 'Admin',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        User::create([
            'first_name' => 'Teacher',
            'last_name' => 'User',
            'email' => 'teacher@example.com',
            'phone_number' => '0987654321',
            'university_name' => 'University',
            'faculty' => 'Faculty',
            'password' => Hash::make('password'),
            'is_teacher' => true,
        ]);
    }
}

