<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Reset tabel (aman untuk development)
        DB::table('reviews')->delete();

        // Cari id status "Sudah Diterima" dari order_statuses (fallback ke 5 jika belum ada)
        $deliveredStatusId = DB::table('order_statuses')
            ->where('name', 'Sudah Diterima')
            ->value('id') ?? 5;

        // Ambil order yang pernah mencapai status "Sudah Diterima"
        $deliveredOrderIds = DB::table('order_status_history')
            ->where('to_status_id', $deliveredStatusId)
            ->pluck('order_id')
            ->unique()
            ->all();

        if (empty($deliveredOrderIds)) {
            return;
        }

        // Ambil pasangan user-product dari order_items untuk order yang sudah diterima
        $rows = DB::table('order_items as oi')
            ->join('orders as o', 'oi.order_id', '=', 'o.id')
            ->whereIn('oi.order_id', $deliveredOrderIds)
            ->select('o.user_id', 'oi.product_id')
            ->get();

        if ($rows->isEmpty()) {
            return;
        }

        $faker = Faker::create('id_ID');

        // Kumpulkan pasangan unik user-product
        $pairs = [];
        foreach ($rows as $r) {
            $key = $r->user_id . '-' . $r->product_id;
            if (! isset($pairs[$key])) {
                $pairs[$key] = [
                    'user_id' => $r->user_id,
                    'product_id' => $r->product_id,
                ];
            }
        }

        // Siapkan data review; batasi jumlah agar tidak terlalu banyak
        $max = 50;
        $inserts = [];
        foreach ($pairs as $pair) {
            if (count($inserts) >= $max) {
                break;
            }

            $rating = rand(3, 5); // review setelah diterima umumnya 3-5
            $title = $faker->optional(0.8)->sentence(3);
            $body = $faker->optional(0.9)->paragraph();

            $inserts[] = [
                'user_id' => $pair['user_id'],
                'product_id' => $pair['product_id'],
                'rating' => $rating,
                'title' => $title,
                'body' => $body,
                'is_approved' => true, // karena order sudah diterima
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        if (! empty($inserts)) {
            // Insert in chunks
            foreach (array_chunk($inserts, 100) as $chunk) {
                DB::table('reviews')->insert($chunk);
            }
        }
    }
}
