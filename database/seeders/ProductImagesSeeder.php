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
        $images = [
            [
                'product_id' => 1,
                'url' => 'https://example.com/images/product1-1.jpg',
                'is_primary' => true,
                'sort_order' => 1,
            ],
            [
                'product_id' => 1,
                'url' => 'https://example.com/images/product1-2.jpg',
                'is_primary' => false,
                'sort_order' => 2,
            ],
            [
                'product_id' => 2,
                'url' => 'https://example.com/images/product2-1.jpg',
                'is_primary' => true,
                'sort_order' => 1,
            ],
            [
                'product_id' => 3,
                'url' => 'https://example.com/images/product3-1.jpg',
                'is_primary' => true,
                'sort_order' => 1,
            ],
        ];

        foreach ($images as $image) {
            \DB::table('product_images')->insert($image);
        }
    }
}
