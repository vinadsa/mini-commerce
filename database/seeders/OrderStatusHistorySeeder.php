<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderStatusHistorySeeder extends Seeder
{
    public function run(): void
    {
        // Contoh minimal, hanya jika order id 1 ada
        if (!DB::table('orders')->where('id', 1)->exists()) {
            return;
        }

        $now = Carbon::now();
        $rows = [
            [
                'order_id' => 1,
                'from_status_id' => null,
                'to_status_id' => 1, // Pending
                'changed_by' => 1,
                'note' => 'Order dibuat',
                'created_at' => $now,
            ],
            [
                'order_id' => 1,
                'from_status_id' => 1,
                'to_status_id' => 3, // Processing
                'changed_by' => 1,
                'note' => 'Pembayaran dikonfirmasi',
                'created_at' => $now->copy()->addMinutes(5),
            ],
        ];

        foreach ($rows as $row) {
            DB::table('order_status_history')->insert($row);
        }
    }
}