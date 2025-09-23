<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentsTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // Ambil orders yang sudah paid
        $paidOrderIds = DB::table('payments')
            ->where('status', 'paid')
            ->pluck('order_id')
            ->all();

        if (empty($paidOrderIds)) {
            return;
        }

        $shipments = [];
        foreach ($paidOrderIds as $i => $orderId) {
            $status = $i % 2 === 0 ? 'shipped' : 'in_transit';
            $shipments[] = [
                'order_id' => $orderId,
                'carrier' => 'JNE',
                'tracking_number' => 'TRK' . str_pad((string)$orderId, 8, '0', STR_PAD_LEFT),
                'status' => $status,
                'shipped_at' => $now->copy()->subHours(4),
                'delivered_at' => $status === 'shipped' ? null : null,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('shipments')->insert($shipments);
    }
}