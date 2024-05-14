<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'email' => 'user@supro.com',
            'password' => bcrypt('password'),
        ])->assignRole('user');

        User::create([
            'name' => 'Test Staff',
            'email' => 'staff@supro.com',
            'password' => bcrypt('password'),
        ])->assignRole('staff');

        User::create([
            'name' => 'Test Admin',
            'email' => 'admin@supro.com',
            'password' => bcrypt('password'),
        ])->assignRole('admin');
    }
}
