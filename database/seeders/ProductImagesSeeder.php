<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        $images = [
            [
                'product_id' => 1,
                'url' => 'https://example.com/images/product1-1.jpg',
                'is_primary' => true,
                'sort_order' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 1,
                'url' => 'https://example.com/images/product1-2.jpg',
                'is_primary' => false,
                'sort_order' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 2,
                'url' => 'https://example.com/images/product2-1.jpg',
                'is_primary' => true,
                'sort_order' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 3,
                'url' => 'https://example.com/images/product3-1.jpg',
                'is_primary' => true,
                'sort_order' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($images as $image) {
            \DB::table('product_images')->insert($image);
        }
    }
}
