<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // INI HARUS URUT YA GES DATA MANA YANG MASUK DLU, Ini aku comment contohnya, realnya silahkan dibuat yhh
        $this->call([
            // // 1. Users & Master Status
            // UsersTableSeeder::class,
            // OrderStatusSeeder::class,
            // // 2. Katalog
            // CategoriesTableSeeder::class,
            // ProductsTableSeeder::class,
            // ProductImagesTableSeeder::class,
            // // 3. Cart (butuh users & products)
            // CartsTableSeeder::class,
            // CartItemsTableSeeder::class,
            // // 4. Orders (butuh status & users)
            // OrdersTableSeeder::class,
            // OrderItemsTableSeeder::class,
            // PaymentsTableSeeder::class,
            // ShipmentsTableSeeder::class,
            // // 5. Data tambahan
            // UserAddressSeeder::class,
            // CouponSeeder::class,
            // ReviewSeeder::class,
            // // 6. Riwayat status (terakhir)
            // OrderStatusHistorySeeder::class,
        ]);
    }
}


// Urutan seeding yang aman:
// categories
// products (+ product_images)
// users
// carts (+ cart_items)
// order_statuses
// orders (+ order_items, payments, shipments, order_status_history)
// reviews
// coupons