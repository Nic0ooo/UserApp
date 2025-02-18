<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Nicolas Guilland',
            'email' => 'guillandnicolas@icloud.com',
            'password' => Hash::make('azerty123'),
        ]);

        User::create([
            'name' => 'Tom Paya',
            'email' => 'tompaya@demo.com',
            'password' => Hash::make('password123'),
        ]);
    }
}