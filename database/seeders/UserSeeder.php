<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Muhammed Gamal',
            'email' => 'Mu@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'instructor'
        ]);

        User::create([
            'name' => 'Aly Ahmed',
            'email' => 'Aly@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'instructor'
        ]);

        User::create([
            'name' => 'Sara Mohamed',
            'email' => 'Sara@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'instructor'
        ]);

        // Students
        User::create([
            'name' => 'Wafaa Elmenofy',
            'email' => 'Wafaa@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'student'
        ]);

        User::create([
            'name' => 'Shahd Ali',
            'email' => 'Shahd@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'student'
        ]);

        User::create([
            'name' => 'Samaa Hassan',
            'email' => 'Samaa@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'student'
        ]);

        User::create([
            'name' => 'Shrouk Amr',
            'email' => 'Shrouk@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'student'
        ]);

        User::create([
            'name' => 'Nada Salah',
            'email' => 'Nada@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'student'
        ]);

        User::create([
            'name' => 'Mona Farid',
            'email' => 'Mona@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'student'
        ]);

        User::create([
            'name' => 'Hana Tarek',
            'email' => 'Hana@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'student'
        ]);

        User::create([
            'name' => 'Omar Khaled',
            'email' => 'Omar@example.com',
            'password' => Hash::make('123456789'),
            'role' => 'student'
        ]);
    }
}
