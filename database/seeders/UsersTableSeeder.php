<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password_hash' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '081234567890',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password_hash' => Hash::make('password'),
                'role' => 'user',
                'phone' => '081111111111',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Jane User',
                'email' => 'jane@example.com',
                'password_hash' => Hash::make('password'),
                'role' => 'user',
                'phone' => '082222222222',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}