<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemsTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();
        $orders = DB::table('orders')->where('order_number', 'like', 'ORD-%')->get();
        $products = DB::table('products')
            ->select('id', 'name', 'sku', 'price')
            ->orderBy('id')
            ->get()
            ->all();

        if ($orders->isEmpty() || empty($products)) {
            return;
        }

        $itemsToInsert = [];
        foreach ($orders as $order) {
            // Ambil 2–3 produk acak
            $picked = collect($products)->random(min(3, max(2, count($products))));
            $totalItems = 0;
            $subtotalAll = 0;

            foreach ($picked as $p) {
                $qty = rand(1, 3);
                $subtotal = $p->price * $qty;
                $itemsToInsert[] = [
                    'order_id' => $order->id,
                    'product_id' => $p->id,
                    'product_name' => $p->name,
                    'sku' => $p->sku,
                    'price' => $p->price,
                    'qty' => $qty,
                    'subtotal' => $subtotal,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
                $totalItems += $qty;
                $subtotalAll += $subtotal;
            }

            // Hitung total order (simplified: subtotal + shipping)
            $shipping = $order->shipping_cost;
            $discount = $order->discount;
            $tax = $order->tax;
            $grand = $subtotalAll + $shipping + $tax - $discount;

            DB::table('orders')->where('id', $order->id)->update([
                'total' => $grand,
                'total_items' => $totalItems,
                'updated_at' => $now,
            ]);
        }

        if (!empty($itemsToInsert)) {
            DB::table('order_items')->insert($itemsToInsert);
        }
    }
}