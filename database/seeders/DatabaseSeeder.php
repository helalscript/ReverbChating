<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin'
        ]);
        User::factory()->create([
            'name' => 'Manager',
            'email' => 'manager@manager.com',
            'password' => bcrypt('12345678'),
            'role' => 'manager'
        ]);
        User::factory()->create([
            'name' => 'Guest',
            'email' => 'guest@guest.com',
            'password' => bcrypt('12345678'),
            'role' => 'guest'
        ]);
    }
}