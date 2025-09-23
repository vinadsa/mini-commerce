<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CartsTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $users = DB::table('users')->pluck('id')->take(2); // dua user pertama
        foreach ($users as $userId) {
            DB::table('carts')->insert([
                'user_id' => $userId,
                'session_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Satu cart berbasis session (guest)
        DB::table('carts')->insert([
            'user_id' => null,
            'session_token' => Str::random(40),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}