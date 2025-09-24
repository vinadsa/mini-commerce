<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $coupons = [
                [
                    'code' => 'DISC10',
                    'type' => 'percentage',
                    'value' => 10.00,
                    'min_order_amount' => 100000.00,
                    'expires_at' => now()->addDays(30),
                    'usage_limit' => 100,
                    'used_count' => 1,
                    'is_active' => true,
                    'created_at' => now()->subDays(5),
                ],
                [
                    'code' => 'ONGKIR15K',
                    'type' => 'fixed',
                    'value' => 15000.00,
                    'min_order_amount' => 200000.00,
                    'expires_at' => now()->addDays(15),
                    'usage_limit' => 50,
                    'used_count' => 0,
                    'is_active' => true,
                    'created_at' => now()->subDays(3),
                ],
                [
                    'code' => 'EWALLET20',
                    'type' => 'percentage',
                    'value' => 20.00,
                    'min_order_amount' => 300000.00,
                    'expires_at' => now()->addDays(10),
                    'usage_limit' => 20,
                    'used_count' => 1,
                    'is_active' => true,
                    'created_at' => now()->subDays(1),
                ],
            ];

            foreach ($coupons as $coupon) {
                \DB::table('coupons')->insert($coupon);
            }
    }
}
