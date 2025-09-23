<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentsTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $orders = DB::table('orders')->orderBy('id')->get();

        if ($orders->isEmpty()) {
            return;
        }

        $inserts = [];
        foreach ($orders as $idx => $order) {
            $isPaid = $idx % 2 === 0; // sebagian paid
            $inserts[] = [
                'order_id' => $order->id,
                'amount' => $order->total,
                'method' => $isPaid ? 'virtual_account' : 'bank_transfer',
                'status' => $isPaid ? 'paid' : 'pending',
                'gateway_ref' => $isPaid ? 'PAY-' . strtoupper(substr(sha1($order->order_number), 0, 10)) : null,
                'paid_at' => $isPaid ? $now : null,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('payments')->insert($inserts);
    }
}