<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        \DB::table('orders')->delete();

        $orders = [
            [
                'order_number' => 'ORD-20250924001',
                'user_id' => 1,
                'status_id' => 1,
                'total' => 250000.00,
                'total_items' => 3,
                'shipping_cost' => 15000.00,
                'tax' => 2500.00,
                'discount' => 5000.00,
                'payment_method' => 'Transfer Bank',
                'shipping_address_text' => 'Jl. Mawar No. 1, Jakarta',
                'billing_address_text' => 'Jl. Melati No. 2, Jakarta',
                'note' => 'Harap dikirim secepatnya',
            ],
            [
                'order_number' => 'ORD-20250924002',
                'user_id' => 2,
                'status_id' => 2,
                'total' => 120000.00,
                'total_items' => 1,
                'shipping_cost' => 10000.00,
                'tax' => 1200.00,
                'discount' => 0.00,
                'payment_method' => 'COD',
                'shipping_address_text' => 'Jl. Kenanga No. 3, Bandung',
                'billing_address_text' => 'Jl. Kenanga No. 3, Bandung',
                'note' => null,
            ],
            [
                'order_number' => 'ORD-20250924003',
                'user_id' => 1,
                'status_id' => 3,
                'total' => 500000.00,
                'total_items' => 5,
                'shipping_cost' => 20000.00,
                'tax' => 5000.00,
                'discount' => 10000.00,
                'payment_method' => 'E-Wallet',
                'shipping_address_text' => 'Jl. Anggrek No. 4, Surabaya',
                'billing_address_text' => 'Jl. Anggrek No. 4, Surabaya',
                'note' => 'Packing aman ya',
            ],
        ];

        foreach ($orders as $order) {
            $order['created_at'] = $now;
            $order['updated_at'] = $now;
            DB::table('orders')->insert($order);
        }
    }
}
