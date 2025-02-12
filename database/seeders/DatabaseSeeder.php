<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'no_ktp' => '2024001',
            'username' => 'admin_24',
            'date_of_birth' => '2000-01-01',
            'email' => 'admin24@gmail.com',
            'password' => Hash::make('admin24'),
            'phone' => '123456781',
            'description' => 'a admin',
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'no_ktp' => '2024002',
            'username' => 'user_24',
            'date_of_birth' => '2000-01-01',
            'email' => 'user24@gmail.com',
            'password' => Hash::make('user24'),
            'phone' => '123456781',
            'description' => 'a user',
            'role' => 'user'
        ]);
    }
}
