<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Master / reference data
        $this->call([
            OrderStatusSeeder::class,
        ]);

        // 2. Users & related
        $this->call([
            UsersSeeder::class,
            UserAddressSeeder::class,
        ]);

        // 3. Cart (butuh users)
        $this->call([
            CartsSeeder::class,
            // CartItemsTableSeeder::class, // tambahkan jika ada
        ]);

        // 4. Orders + related (order items, payments, shipments)
        $this->call([
            OrdersSeeder::class,
            OrderItemSeeder::class,
            PaymentsSeeder::class,
            ShipmentSeeder::class,
        ]);

        // 5. Riwayat status lalu review (mengandalkan order_status_history)
        $this->call([
            OrderStatusHistorySeeder::class,
            ReviewsSeeder::class,
        ]);

        // Test user (buat setelah UsersSeeder agar tidak tertimpa)
        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}