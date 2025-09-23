<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        // Pastikan product_id & user_id sesuai data yang ada.
        $reviews = [
            [
                'user_id' => 1,
                'product_id' => 1,
                'rating' => 5,
                'title' => 'Produk sangat bagus',
                'body' => 'Kualitas melebihi ekspektasi.',
                'is_approved' => true,
                'created_at' => $now,
            ],
            [
                'user_id' => 2,
                'product_id' => 1,
                'rating' => 4,
                'title' => 'Mantap',
                'body' => 'Pengiriman cepat, barang ok.',
                'is_approved' => true,
                'created_at' => $now,
            ],
            [
                'user_id' => 1,
                'product_id' => 2,
                'rating' => 3,
                'title' => 'Cukup',
                'body' => 'Sesuai harga.',
                'is_approved' => false,
                'created_at' => $now,
            ],
        ];

        foreach ($reviews as $r) {
            DB::table('reviews')->updateOrInsert(
                ['user_id' => $r['user_id'], 'product_id' => $r['product_id']],
                $r
            );
        }
    }
}