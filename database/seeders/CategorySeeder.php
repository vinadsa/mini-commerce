<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->upsert([
            ['id' => 1,  'name' => 'Pakaian Pria',          'description' => 'Kemeja, kaos, jaket, dan pakaian pria', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2,  'name' => 'Sepatu Pria',           'description' => 'Sneakers, formal, dan boots pria',       'created_at' => now(), 'updated_at' => now()],
            ['id' => 3,  'name' => 'Tas Pria',              'description' => 'Backpack, sling bag, dan tas kerja',     'created_at' => now(), 'updated_at' => now()],
            ['id' => 4,  'name' => 'Aksesoris Fashion',     'description' => 'Kacamata, topi, sabuk, dan aksesori',    'created_at' => now(), 'updated_at' => now()],
            ['id' => 5,  'name' => 'Makanan & Minuman',     'description' => 'Snack, bahan makanan, dan minuman',      'created_at' => now(), 'updated_at' => now()],
            ['id' => 6,  'name' => 'Perawatan & Kecantikan','description' => 'Skincare, haircare, dan kosmetik',       'created_at' => now(), 'updated_at' => now()],
            ['id' => 7,  'name' => 'Perlengkapan Rumah',    'description' => 'Furniture kecil, dekorasi, dan alat rumah','created_at' => now(), 'updated_at' => now()],
            ['id' => 8,  'name' => 'Pakaian Wanita',        'description' => 'Blouse, dress, outer, dan lainnya',      'created_at' => now(), 'updated_at' => now()],
            ['id' => 9,  'name' => 'Fashion Wanita',        'description' => 'Aksesori, perhiasan, dan item fashion',  'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'Sepatu Wanita',         'description' => 'Flat, heels, dan sneakers wanita',       'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'name' => 'Tas Wanita',            'description' => 'Handbag, tote, dan sling bag',           'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'name' => 'Hobi & Koleksi',        'description' => 'Mainan, musik, dan koleksi hobi',        'created_at' => now(), 'updated_at' => now()],
        ], ['id'], ['name', 'description', 'updated_at']);
    }
}