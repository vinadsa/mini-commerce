<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('products')->upsert([
            // ==================== Pakaian Pria (UMKM Konveksi Lokal) ====================
            ['name' => 'Kaos Katun Bordir Lokal',   'description' => 'Kaos katun dengan bordir etnik khas daerah',       'sku' => 'UMKM-MEN-001', 'price' => 85000.00,  'stock' => 40, 'category_id' => 1, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kemeja Batik Pria',         'description' => 'Batik tulis buatan perajin lokal',                 'sku' => 'UMKM-MEN-002', 'price' => 179000.00, 'stock' => 25, 'category_id' => 1, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Jaket Denim Lokal',         'description' => 'Diproduksi UMKM konveksi dengan bahan premium',    'sku' => 'UMKM-MEN-003', 'price' => 220000.00, 'stock' => 15, 'category_id' => 1, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // ==================== Sepatu Pria (UMKM Sepatu Cibaduyut, Tanggulangin) ====================
            ['name' => 'Sepatu Kulit Handmade',     'description' => 'Sepatu formal kulit asli buatan pengrajin lokal',  'sku' => 'UMKM-SHOE-M-001','price' => 280000.00,'stock' => 20, 'category_id' => 2, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sneakers Kanvas Lokal',     'description' => 'Sneakers buatan tangan dengan bahan kanvas',       'sku' => 'UMKM-SHOE-M-002','price' => 160000.00,'stock' => 30, 'category_id' => 2, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sandal Kulit Handmade',     'description' => 'Sandal pria berbahan kulit sapi lokal',            'sku' => 'UMKM-SHOE-M-003','price' => 120000.00,'stock' => 35, 'category_id' => 2, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // ==================== Tas Pria (UMKM Tanggulangin, Kulit Lokal) ====================
            ['name' => 'Tas Selempang Kulit',       'description' => 'Tas kulit asli buatan UMKM Tanggulangin',          'sku' => 'UMKM-BAG-M-001','price' => 250000.00,'stock' => 18, 'category_id' => 3, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Backpack Kanvas Lokal',     'description' => 'Diproduksi UMKM dengan bahan kanvas tebal',        'sku' => 'UMKM-BAG-M-002','price' => 195000.00,'stock' => 22, 'category_id' => 3, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // ==================== Aksesoris Fashion (Kerajinan Lokal) ====================
            ['name' => 'Gelang Manik-Manik',        'description' => 'Kerajinan tangan dari manik-manik kaca lokal',     'sku' => 'UMKM-ACC-001', 'price' => 45000.00, 'stock' => 50, 'category_id' => 4, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Topi Anyaman Rotan',        'description' => 'Topi handmade dari anyaman rotan',                 'sku' => 'UMKM-ACC-002', 'price' => 65000.00, 'stock' => 40, 'category_id' => 4, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dompet Kulit Lokal',        'description' => 'Dompet pria handmade berbahan kulit sapi lokal',   'sku' => 'UMKM-ACC-003', 'price' => 99000.00, 'stock' => 35, 'category_id' => 4, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // ==================== Makanan & Minuman (Oleh-oleh UMKM) ====================
            ['name' => 'Keripik Pisang Coklat',     'description' => 'Olahan pisang khas Lampung',                       'sku' => 'UMKM-FOOD-001','price' => 25000.00, 'stock' => 100,'category_id' => 5, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kopi Robusta Lampung',      'description' => 'Bubuk kopi robusta dari petani lokal',             'sku' => 'UMKM-FOOD-002','price' => 55000.00, 'stock' => 60, 'category_id' => 5, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Dodol Garut Original',      'description' => 'Dodol khas Garut buatan UMKM setempat',            'sku' => 'UMKM-FOOD-003','price' => 35000.00, 'stock' => 80, 'category_id' => 5, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // ==================== Perawatan & Kecantikan (Herbal UMKM) ====================
            ['name' => 'Sabun Susu Kambing',        'description' => 'Sabun alami produksi UMKM lokal',                  'sku' => 'UMKM-BEAU-001','price' => 25000.00, 'stock' => 50, 'category_id' => 6, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Minyak Lulur Rempah',      'description' => 'Lulur tradisional dengan rempah alami',            'sku' => 'UMKM-BEAU-002','price' => 40000.00, 'stock' => 45, 'category_id' => 6, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Herbal Hair Tonic',        'description' => 'Perawatan rambut dari ekstrak tanaman lokal',      'sku' => 'UMKM-BEAU-003','price' => 60000.00, 'stock' => 30, 'category_id' => 6, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // ==================== Perlengkapan Rumah (Kerajinan UMKM) ====================
            ['name' => 'Lampu Hias Batok Kelapa',  'description' => 'Lampu meja unik dari batok kelapa',                 'sku' => 'UMKM-HOME-001','price' => 125000.00,'stock' => 20, 'category_id' => 7, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Vas Anyaman Bambu',        'description' => 'Vas bunga handmade dari bambu lokal',               'sku' => 'UMKM-HOME-002','price' => 65000.00, 'stock' => 35, 'category_id' => 7, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Taplak Meja Batik',        'description' => 'Taplak meja dengan motif batik tradisional',       'sku' => 'UMKM-HOME-003','price' => 95000.00, 'stock' => 28, 'category_id' => 7, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // ==================== Pakaian Wanita (Konveksi UMKM) ====================
            ['name' => 'Dress Batik Modern',       'description' => 'Dress wanita dengan motif batik modern',           'sku' => 'UMKM-WOM-001', 'price' => 185000.00,'stock' => 30, 'category_id' => 8, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Blouse Tenun Ikat',        'description' => 'Blouse wanita dari kain tenun ikat lokal',         'sku' => 'UMKM-WOM-002', 'price' => 165000.00,'stock' => 20, 'category_id' => 8, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Outer Rajut Handmade',     'description' => 'Outer cardigan rajut hasil karya UMKM',            'sku' => 'UMKM-WOM-003', 'price' => 145000.00,'stock' => 25, 'category_id' => 8, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // ==================== Fashion Wanita (Aksesoris UMKM) ====================
            ['name' => 'Anting Perak Handmade',    'description' => 'Anting perak asli buatan pengrajin lokal',          'sku' => 'UMKM-FACC-001','price' => 120000.00,'stock' => 20, 'category_id' => 9, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Kalung Manik-Manik',       'description' => 'Kalung handmade dari manik khas Bali',              'sku' => 'UMKM-FACC-002','price' => 95000.00, 'stock' => 25, 'category_id' => 9, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cincin Kayu Unik',         'description' => 'Cincin buatan tangan dari kayu lokal',              'sku' => 'UMKM-FACC-003','price' => 55000.00, 'stock' => 35, 'category_id' => 9, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // ==================== Sepatu Wanita (UMKM Cibaduyut, Lokal) ====================
            ['name' => 'Flat Shoes Handmade',      'description' => 'Flat shoes wanita produksi pengrajin lokal',        'sku' => 'UMKM-SHOE-W-001','price' => 160000.00,'stock' => 30, 'category_id' => 10, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sandal Etnik Anyaman',     'description' => 'Sandal wanita dari anyaman pandan lokal',           'sku' => 'UMKM-SHOE-W-002','price' => 95000.00, 'stock' => 40, 'category_id' => 10, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sepatu Heels Kulit',       'description' => 'Heels berbahan kulit sintetis buatan UMKM',         'sku' => 'UMKM-SHOE-W-003','price' => 190000.00,'stock' => 15, 'category_id' => 10, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // ==================== Tas Wanita (UMKM Tanggulangin, Handmade) ====================
            ['name' => 'Tas Anyaman Pandan',       'description' => 'Tas tangan wanita dari anyaman pandan lokal',       'sku' => 'UMKM-BAG-W-001','price' => 130000.00,'stock' => 20, 'category_id' => 11, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Handbag Tenun Ikat',       'description' => 'Tas wanita dengan motif tenun ikat khas NTT',       'sku' => 'UMKM-BAG-W-002','price' => 220000.00,'stock' => 15, 'category_id' => 11, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Clutch Batik Handmade',    'description' => 'Clutch kecil dengan motif batik lokal',             'sku' => 'UMKM-BAG-W-003','price' => 95000.00, 'stock' => 25, 'category_id' => 11, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

            // ==================== Hobi & Koleksi (UMKM Kreatif) ====================
            ['name' => 'Mainan Kayu Edukatif',     'description' => 'Mainan edukasi anak dari kayu buatan UMKM',         'sku' => 'UMKM-HOB-001', 'price' => 85000.00, 'stock' => 30, 'category_id' => 12, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Miniatur Perahu Tradisional','description'=> 'Kerajinan miniatur perahu khas Bugis',             'sku' => 'UMKM-HOB-002', 'price' => 175000.00,'stock' => 12, 'category_id' => 12, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Topeng Kayu Wayang',       'description' => 'Topeng kayu ukiran khas Jawa untuk koleksi',        'sku' => 'UMKM-HOB-003', 'price' => 145000.00,'stock' => 18, 'category_id' => 12, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],

        ], ['sku'], ['name','description','price','stock','category_id','is_active','updated_at']);
    }
}
