<?php

namespace Database\Seeders;

use App\Models\DetailUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $user = User::create([
                'name' => 'Test User',
                'email' => 'user@supro.com',
                'password' => bcrypt('password'),
            ])->assignRole('user');

            DetailUser::create([
                'users_id' => $user->id,
                'address' => 'Jl. Test No. 123',
                // Add other fields for DetailUser as needed
            ]);

            $staff = User::create([
                'name' => 'Test Staff',
                'email' => 'staff@supro.com',
                'password' => bcrypt('password'),
            ])->assignRole('staff');

            DetailUser::create([
                'users_id' => $staff->id,
                'address' => 'Jl. Staff No. 456',
                // Add other fields for DetailUser as needed
            ]);

            $admin = User::create([
                'name' => 'Test Admin',
                'email' => 'admin@supro.com',
                'password' => bcrypt('password'),
            ])->assignRole('admin');

            DetailUser::create([
                'users_id' => $admin->id,
                'address' => 'Jl. Admin No. 789',
                // Add other fields for DetailUser as needed
            ]);
    }
}
