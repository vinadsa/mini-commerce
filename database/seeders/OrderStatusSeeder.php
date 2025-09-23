<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    public function run(): void
    {
        // Hindari duplikasi
        $data = [
            ['id' => 1, 'name' => 'Pending',        'sort_order' => 10],
            ['id' => 2, 'name' => 'Payment Pending','sort_order' => 20],
            ['id' => 3, 'name' => 'Processing',     'sort_order' => 30],
            ['id' => 4, 'name' => 'Shipped',        'sort_order' => 40],
            ['id' => 5, 'name' => 'Delivered',      'sort_order' => 50],
            ['id' => 6, 'name' => 'Cancelled',      'sort_order' => 60],
            ['id' => 7, 'name' => 'Refunded',       'sort_order' => 70],
        ];

        foreach ($data as $row) {
            DB::table('order_statuses')->updateOrInsert(['id' => $row['id']], $row);
        }
    }
}