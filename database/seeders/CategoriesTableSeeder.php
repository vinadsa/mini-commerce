<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $categories = [
            ['name' => 'Elektronik', 'description' => 'Perangkat elektronik & gadget'],
            ['name' => 'Fashion Pria', 'description' => 'Pakaian & aksesoris pria'],
            ['name' => 'Fashion Wanita', 'description' => 'Pakaian & aksesoris wanita'],
            ['name' => 'Olahraga', 'description' => 'Peralatan & perlengkapan olahraga'],
            ['name' => 'Rumah Tangga', 'description' => 'Produk kebutuhan rumah'],
        ];

        foreach ($categories as $c) {
            DB::table('categories')->insert([
                'name' => $c['name'],
                'slug' => Str::slug($c['name']),
                'description' => $c['description'],
                'created_at' => $now,
            ]);
        }
    }
}