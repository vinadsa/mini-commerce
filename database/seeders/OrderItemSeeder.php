<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $items = [
                // Untuk order_id 1 (ORD-20250924001)
                [
                    'order_id' => 1,
                    'product_id' => 1,
                    'product_name' => 'Produk A',
                    'sku' => 'SKU-A',
                    'price' => 100000.00,
                    'qty' => 1,
                    'subtotal' => 100000.00,
                ],
                [
                    'order_id' => 1,
                    'product_id' => 2,
                    'product_name' => 'Produk B',
                    'sku' => 'SKU-B',
                    'price' => 75000.00,
                    'qty' => 2,
                    'subtotal' => 150000.00,
                ],
                // Untuk order_id 2 (ORD-20250924002)
                [
                    'order_id' => 2,
                    'product_id' => 3,
                    'product_name' => 'Produk C',
                    'sku' => 'SKU-C',
                    'price' => 120000.00,
                    'qty' => 1,
                    'subtotal' => 120000.00,
                ],
                // Untuk order_id 3 (ORD-20250924003)
                [
                    'order_id' => 3,
                    'product_id' => 1,
                    'product_name' => 'Produk A',
                    'sku' => 'SKU-A',
                    'price' => 100000.00,
                    'qty' => 2,
                    'subtotal' => 200000.00,
                ],
                [
                    'order_id' => 3,
                    'product_id' => 4,
                    'product_name' => 'Produk D',
                    'sku' => 'SKU-D',
                    'price' => 150000.00,
                    'qty' => 2,
                    'subtotal' => 300000.00,
                ],
                [
                    'order_id' => 3,
                    'product_id' => 2,
                    'product_name' => 'Produk B',
                    'sku' => 'SKU-B',
                    'price' => 0.00,
                    'qty' => 1,
                    'subtotal' => 0.00,
                ],
            ];

            foreach ($items as $item) {
                \DB::table('order_items')->insert($item);
            }
    }
}
