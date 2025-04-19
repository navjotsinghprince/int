<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        \App\Models\User::truncate();

        \App\Models\User::factory()->create([
            'user_type' => 1,
            'name' => 'Admin',
            'email' => 'admin@user.com',
            'password' => Hash::make("12345"),
        ]);

        \App\Models\User::factory()->create([
            'user_type' => 2,
            'name' => 'Test User',
            'email' => 'test@user.com',
            'password' => Hash::make("12345"),
        ]);

        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
