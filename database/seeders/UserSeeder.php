<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'arisandi',
            'email' => 'test@gmail.com',
            'password' => Hash::make('test'),
            'role' => 'admin'
        ]);
    
        User::create([
            'name' => 'nandi',
            'email' => 'test1@gmail.com',
            'password' => Hash::make('user'),
            'role' => 'user'
        ]);
    }
}
