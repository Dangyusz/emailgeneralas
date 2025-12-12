<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test users
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password', // Will be hashed by User model
            'c_name' => 'Test Company',
            'job_title' => 'Developer',
            'tell' => '+36 20 123 4567',
        ]);

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password',
            'c_name' => 'Admin Corp',
            'job_title' => 'Administrator',
            'tell' => '+36 30 987 6543',
        ]);

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'c_name' => 'Acme Inc',
            'job_title' => 'Manager',
            'tell' => '+36 70 555 1234',
        ]);

        // Generate 7 more random users
        User::factory(7)->create();
    }
}
