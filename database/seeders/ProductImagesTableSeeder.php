<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $products = DB::table('products')->select('id', 'slug')->get();

        foreach ($products as $product) {
            DB::table('product_images')->insert([
                [
                    'product_id' => $product->id,
                    'url' => "https://picsum.photos/seed/{$product->slug}-1/600/600",
                    'is_primary' => true,
                    'sort_order' => 1,
                    'created_at' => $now,
                ],
                [
                    'product_id' => $product->id,
                    'url' => "https://picsum.photos/seed/{$product->slug}-2/600/600",
                    'is_primary' => false,
                    'sort_order' => 2,
                    'created_at' => $now,
                ],
            ]);
        }
    }
}