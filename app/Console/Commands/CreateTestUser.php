<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateTestUser extends Command
{
    protected $signature = 'user:create-test';
    protected $description = 'Create test users (admin and regular user)';

    public function handle()
    {
        // Create regular user
        User::where('email', 'ryan@gmail.com')->delete();
        $user = User::create([
            'name' => 'Ryan',
            'email' => 'ryan@gmail.com',
            'password' => Hash::make('Ryzuru11'),
            'user_country' => 'Indonesia',
            'phone_number' => '081234567890',
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        $this->info('Regular user created successfully!');
        $this->info('Email: ryan@gmail.com');
        $this->info('Password: Ryzuru11');
        
        // Create admin user
        User::where('email', 'zurok@gmail.com')->delete();
        $admin = User::create([
            'name' => 'Zurok',
            'email' => 'zurok@gmail.com',
            'password' => Hash::make('admin123'),
            'user_country' => 'Indonesia',
            'phone_number' => '6281917166060',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        $this->info('Admin user created successfully!');
        $this->info('Email: zurok@gmail.com');
        $this->info('Password: admin123');
        
        return 0;
    }
}