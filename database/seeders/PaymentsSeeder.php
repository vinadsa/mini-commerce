<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Hapus data lama (aman untuk development)
        DB::table('payments')->delete();

        // Ambil orders yang sudah di-seed (cocokkan dengan order_number dari OrdersSeeder)
        $orders = DB::table('orders')
            ->whereIn('order_number', [
                'ORD-20250924001',
                'ORD-20250924002',
                'ORD-20250924003',
            ])->get()->keyBy('order_number');

        $inserts = [];

        // ORD-20250924001 : Transfer Bank (anggap sudah dibayar)
        if (isset($orders['ORD-20250924001'])) {
            $order = $orders['ORD-20250924001'];
            $inserts[] = [
                'order_id' => $order->id,
                'amount' => (float) $order->total,
                'method' => 'Transfer Bank',
                'status' => 'paid',
                'gateway_ref' => 'BANK-' . Str::upper(Str::random(12)),
                'paid_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // ORD-20250924002 : COD (belum dibayar / pending)
        if (isset($orders['ORD-20250924002'])) {
            $order = $orders['ORD-20250924002'];
            $inserts[] = [
                'order_id' => $order->id,
                'amount' => (float) $order->total,
                'method' => 'COD',
                'status' => 'pending',
                'gateway_ref' => null,
                'paid_at' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // ORD-20250924003 : E-Wallet (anggap berhasil)
        if (isset($orders['ORD-20250924003'])) {
            $order = $orders['ORD-20250924003'];
            $inserts[] = [
                'order_id' => $order->id,
                'amount' => (float) $order->total,
                'method' => 'E-Wallet',
                'status' => 'paid',
                'gateway_ref' => 'EWALLET-' . Str::upper(Str::random(12)),
                'paid_at' => $now,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        if (!empty($inserts)) {
            DB::table('payments')->insert($inserts);
        }
    }
}
