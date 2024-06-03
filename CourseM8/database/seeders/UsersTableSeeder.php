<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'firstName' => 'John',
                'lastName' => 'Doe',
                'email' => 'john.doe.' . Str::random(5) . '@example.com',
                'password' => Hash::make('password'),
                'bio' => 'A test user',
                'age' => 25,
                'studyAreas' => 'Computer Science',
                'onboarding_completed' => false,
            ],
            [
                'firstName' => 'Jane',
                'lastName' => 'Smith',
                'email' => 'jane.smith.' . Str::random(5) . '@example.com',
                'password' => Hash::make('password'),
                'bio' => 'Another test user',
                'age' => 22,
                'studyAreas' => 'Mathematics',
                'onboarding_completed' => false,
            ],
            // Add more users as needed
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
