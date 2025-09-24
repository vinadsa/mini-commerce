<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Hapus data lama (aman untuk development)
        DB::table('sessions')->delete();
        DB::table('password_reset_tokens')->delete();
        DB::table('users')->delete();

        // Seed users dengan nama yang lebih lengkap
        DB::table('users')->insert([
            [
                'name' => 'Andi Pratama',
                'email' => 'andi.pratama@example.com',
                'password' => Hash::make('secret123'),
                'role' => 'admin',
                'phone' => '081111111111',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.n@example.com',
                'password' => Hash::make('secret123'),
                'role' => 'user',
                'phone' => '081222222222',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.s@example.com',
                'password' => Hash::make('secret123'),
                'role' => 'user',
                'phone' => '081333333333',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi.l@example.com',
                'password' => Hash::make('secret123'),
                'role' => 'user',
                'phone' => '081444444444',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Rina Hartono',
                'email' => 'rina.h@example.com',
                'password' => Hash::make('secret123'),
                'role' => 'user',
                'phone' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        // Seed one password reset token (contoh)
        DB::table('password_reset_tokens')->insert([
            'email' => 'siti.n@example.com',
            'token' => Str::random(64),
            'created_at' => $now,
        ]);

        // Seed satu sample session untuk admin (user id 1)
        DB::table('sessions')->insert([
            'id' => Str::uuid()->toString(),
            'user_id' => 1,
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Seeder',
            'payload' => json_encode(['_token' => Str::random(40)]),
            'last_activity' => time(),
        ]);
    }
}
