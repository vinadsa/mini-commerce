<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $categoryIds = DB::table('categories')->pluck('id', 'slug');

        $products = [
            [
                'name' => 'Smartphone X200',
                'category_slug' => 'elektronik',
                'price' => 4500000,
                'stock' => 25,
                'weight_grams' => 350,
            ],
            [
                'name' => 'Headphone Pro Noise Cancel',
                'category_slug' => 'elektronik',
                'price' => 1250000,
                'stock' => 40,
                'weight_grams' => 220,
            ],
            [
                'name' => 'Jersey Running Premium',
                'category_slug' => 'olahraga',
                'price' => 250000,
                'stock' => 100,
                'weight_grams' => 180,
            ],
            [
                'name' => 'T-shirt Basic Pria',
                'category_slug' => 'fashion-pria',
                'price' => 95000,
                'stock' => 200,
                'weight_grams' => 160,
            ],
            [
                'name' => 'Blender Serbaguna 500W',
                'category_slug' => 'rumah-tangga',
                'price' => 375000,
                'stock' => 60,
                'weight_grams' => 2500,
            ],
        ];

        foreach ($products as $p) {
            $slug = Str::slug($p['name']);
            DB::table('products')->insert([
                'name' => $p['name'],
                'slug' => $slug,
                'description' => 'Deskripsi untuk ' . $p['name'],
                'sku' => strtoupper(Str::random(10)),
                'price' => $p['price'],
                'stock' => $p['stock'],
                'category_id' => $categoryIds[$p['category_slug']] ?? null,
                'is_active' => true,
                'weight_grams' => $p['weight_grams'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}