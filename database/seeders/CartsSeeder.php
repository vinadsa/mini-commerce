<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Hapus data lama (aman untuk development)
        DB::table('carts')->delete();

        // Ambil semua user yang ada
        $userIds = DB::table('users')->pluck('id')->all();

        // Jika tidak ada user, tidak perlu insert
        if (empty($userIds)) {
            return;
        }

        // Siapkan data cart: satu cart per user.
        // Beri session_token pada cart pertama sebagai contoh.
        $inserts = [];
        foreach ($userIds as $index => $userId) {
            $inserts[] = [
                'user_id' => $userId,
                'session_token' => $index === 0 ? Str::random(64) : null,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('carts')->insert($inserts);
    }
}
