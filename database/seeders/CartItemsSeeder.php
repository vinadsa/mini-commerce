<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class CartItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Reset tabel (aman untuk development)
        DB::table('cart_items')->delete();

        // Ambil semua cart dan produk
        $carts = DB::table('carts')->select('id')->pluck('id')->all();
        $products = DB::table('products')->select('id', 'price', 'stock')->get();

        if (empty($carts) || $products->isEmpty()) {
            return;
        }

        $faker = Faker::create('id_ID');

        // Buat map productId => product data untuk cepat akses
        $prodMap = [];
        foreach ($products as $p) {
            $prodMap[$p->id] = ['price' => (float) $p->price, 'stock' => $p->stock];
        }
        $productIds = array_keys($prodMap);

        $inserts = [];

        foreach ($carts as $cartId) {
            // Jumlah item per cart: 1..min(3, jumlah produk)
            $maxItems = min(3, count($productIds));
            $itemsCount = rand(1, $maxItems);

            // Pilih produk unik untuk cart ini
            $chosen = (array) $faker->randomElements($productIds, $itemsCount);

            foreach ($chosen as $pid) {
                $prod = $prodMap[$pid];

                // Tentukan qty berdasarkan stock kalau tersedia
                $maxQty = $prod['stock'] && $prod['stock'] > 0 ? min(5, (int) $prod['stock']) : 5;
                $qty = rand(1, max(1, $maxQty));

                $inserts[] = [
                    'cart_id' => $cartId,
                    'product_id' => $pid,
                    'qty' => $qty,
                    'price' => $prod['price'], // harga saat ini
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        // Insert in chunks untuk aman
        foreach (array_chunk($inserts, 200) as $chunk) {
            DB::table('cart_items')->insert($chunk);
        }
    }
}
