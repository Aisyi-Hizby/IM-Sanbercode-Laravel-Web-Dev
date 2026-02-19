<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@investory.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        $staff = User::create([
            'name' => 'Staff User',
            'email' => 'staff@investory.com',
            'password' => Hash::make('password'),
        ]);
        $staff->assignRole('staff');

        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@investory.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('user');
    }
}