<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin Dilaga Tour',
            'email' => 'zurokmega2017@gmail.com',
            'user_country' => 'Indonesia',
            'phone_number' => '+6281917166060',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        // Create sample regular user
        User::create([
            'name' => 'John Doe',
            'email' => 'zurokmega2017@gmail.com',
            'user_country' => 'Indonesia',
            'phone_number' => '+6281917166060',
            'role' => 'user',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
    }
}