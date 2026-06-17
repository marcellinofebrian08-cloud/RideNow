<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun admin dummy
        User::create([
            'name' => 'Admin RideNow',
            'email' => 'admin@ridenow.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        //akun user dummy
        User::create([
            'name' => 'Penumpang Biasa',
            'email' => 'user@ridenow.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}
