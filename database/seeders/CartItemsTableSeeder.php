<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemsTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $carts = DB::table('carts')->get();
        $products = DB::table('products')->select('id', 'price')->orderBy('id')->get();

        if ($carts->isEmpty() || $products->isEmpty()) {
            return;
        }

        $inserts = [];
        foreach ($carts as $cart) {
            // Ambil 2 produk awal (hindari duplicate pair)
            $selected = $products->take(2);
            foreach ($selected as $p) {
                $qty = rand(1, 3);
                $inserts[] = [
                    'cart_id' => $cart->id,
                    'product_id' => $p->id,
                    'qty' => $qty,
                    'price' => $p->price,
                    'added_at' => $now,
                ];
            }
        }

        // Filter duplikat (cart_id, product_id) jika seeder dijalankan ulang
        $existingPairs = DB::table('cart_items')
            ->select('cart_id', 'product_id')
            ->get()
            ->map(fn ($r) => $r->cart_id . ':' . $r->product_id)
            ->toArray();

        $final = [];
        foreach ($inserts as $row) {
            $key = $row['cart_id'] . ':' . $row['product_id'];
            if (!in_array($key, $existingPairs, true)) {
                $final[] = $row;
            }
        }

        if (!empty($final)) {
            DB::table('cart_items')->insert($final);
        }
    }
}