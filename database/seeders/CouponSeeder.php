<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $coupons = [
            [
                'code' => 'WELCOME10',
                'type' => 'percentage',
                'value' => 10.00,
                'min_order_amount' => 0,
                'expires_at' => $now->copy()->addMonths(6),
                'usage_limit' => 500,
                'used_count' => 0,
                'is_active' => true,
                'created_at' => $now,
            ],
            [
                'code' => 'FLAT5000',
                'type' => 'fixed',
                'value' => 5000,
                'min_order_amount' => 25000,
                'expires_at' => $now->copy()->addMonths(3),
                'usage_limit' => 200,
                'used_count' => 0,
                'is_active' => true,
                'created_at' => $now,
            ],
            [
                'code' => 'FLASH50',
                'type' => 'percentage',
                'value' => 50,
                'min_order_amount' => 100000,
                'expires_at' => $now->copy()->addDays(7),
                'usage_limit' => 50,
                'used_count' => 0,
                'is_active' => true,
                'created_at' => $now,
            ],
        ];

        foreach ($coupons as $c) {
            DB::table('coupons')->updateOrInsert(['code' => $c['code']], $c);
        }
    }
}