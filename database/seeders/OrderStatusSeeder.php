<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $statuses = [
                ['name' => 'Menunggu Pembayaran', 'sort_order' => 1],
                ['name' => 'Sudah Dibayar', 'sort_order' => 2],
                ['name' => 'Sedang Diproses', 'sort_order' => 3],
                ['name' => 'Sedang Dikirim', 'sort_order' => 4],
                ['name' => 'Sudah Diterima', 'sort_order' => 5],
                ['name' => 'Dibatalkan', 'sort_order' => 6],
                ['name' => 'Dana Dikembalikan', 'sort_order' => 7],
            ];

            foreach ($statuses as $status) {
                \DB::table('order_statuses')->insert($status);
            }
    }
}
