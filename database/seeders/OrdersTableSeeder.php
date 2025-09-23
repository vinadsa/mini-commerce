<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrdersTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $users = DB::table('users')->pluck('id')->all();
        if (empty($users)) {
            return;
        }

        // Ambil status pending (fallback ke 1)
        $pendingStatusId = DB::table('order_statuses')
            ->whereIn('name', ['pending', 'Pending'])
            ->value('id') ?? 1;

        $orders = [];
        for ($i = 1; $i <= 5; $i++) {
            $orders[] = [
                'order_number' => 'ORD-' . now()->format('Ymd') . '-' . str_pad((string)$i, 4, '0', STR_PAD_LEFT),
                'user_id' => $users[array_rand($users)],
                'status_id' => $pendingStatusId,
                'total' => 0,            // akan di-update setelah order_items
                'total_items' => 0,      // akan di-update
                'shipping_cost' => 20000,
                'tax' => 0,
                'discount' => 0,
                'payment_method' => null,
                'shipping_address_text' => 'Jalan Contoh No. ' . $i . ', Jakarta',
                'billing_address_text' => 'Jalan Contoh No. ' . $i . ', Jakarta',
                'note' => $i === 1 ? 'Tolong dikirim cepat' : null,
                'created_at' => $now->copy()->subMinutes(10 * $i),
                'updated_at' => $now->copy()->subMinutes(10 * $i),
            ];
        }

        DB::table('orders')->insert($orders);
    }
}