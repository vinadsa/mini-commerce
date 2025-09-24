<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $histories = [
                // Order 1: Menunggu Pembayaran -> Sudah Dibayar -> Sedang Diproses
                [
                    'order_id' => 1,
                    'from_status_id' => null,
                    'to_status_id' => 1, // Menunggu Pembayaran
                    'changed_by' => 1,
                    'note' => 'Order dibuat oleh user',
                    'created_at' => now()->subDays(7),
                ],
                [
                    'order_id' => 1,
                    'from_status_id' => 1,
                    'to_status_id' => 2, // Sudah Dibayar
                    'changed_by' => 1,
                    'note' => 'Pembayaran diterima',
                    'created_at' => now()->subDays(6),
                ],
                [
                    'order_id' => 1,
                    'from_status_id' => 2,
                    'to_status_id' => 3, // Sedang Diproses
                    'changed_by' => 2,
                    'note' => 'Order diproses oleh admin',
                    'created_at' => now()->subDays(5),
                ],

                // Order 2: Menunggu Pembayaran -> Sudah Dibayar
                [
                    'order_id' => 2,
                    'from_status_id' => null,
                    'to_status_id' => 1,
                    'changed_by' => 2,
                    'note' => 'Order dibuat oleh user',
                    'created_at' => now()->subDays(4),
                ],
                [
                    'order_id' => 2,
                    'from_status_id' => 1,
                    'to_status_id' => 2,
                    'changed_by' => 2,
                    'note' => 'Pembayaran COD, status menunggu konfirmasi',
                    'created_at' => now()->subDays(3),
                ],

                // Order 3: Menunggu Pembayaran -> Sudah Dibayar -> Sedang Diproses -> Sedang Dikirim -> Sudah Diterima
                [
                    'order_id' => 3,
                    'from_status_id' => null,
                    'to_status_id' => 1,
                    'changed_by' => 1,
                    'note' => 'Order dibuat oleh user',
                    'created_at' => now()->subDays(5),
                ],
                [
                    'order_id' => 3,
                    'from_status_id' => 1,
                    'to_status_id' => 2,
                    'changed_by' => 1,
                    'note' => 'Pembayaran e-wallet diterima',
                    'created_at' => now()->subDays(4),
                ],
                [
                    'order_id' => 3,
                    'from_status_id' => 2,
                    'to_status_id' => 3,
                    'changed_by' => 2,
                    'note' => 'Order diproses oleh admin',
                    'created_at' => now()->subDays(3),
                ],
                [
                    'order_id' => 3,
                    'from_status_id' => 3,
                    'to_status_id' => 4,
                    'changed_by' => 2,
                    'note' => 'Order dikirim ke alamat tujuan',
                    'created_at' => now()->subDays(2),
                ],
                [
                    'order_id' => 3,
                    'from_status_id' => 4,
                    'to_status_id' => 5,
                    'changed_by' => 1,
                    'note' => 'Order sudah diterima oleh user',
                    'created_at' => now()->subDay(),
                ],
            ];

            foreach ($histories as $history) {
                \DB::table('order_status_history')->insert($history);
            }
    }
}
