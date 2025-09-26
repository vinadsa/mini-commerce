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
            CategorySeeder::class,
            CouponsSeeder::class,
        ]);

        // 2. Catalog (butuh categories)
        $this->call([
            ProductSeeder::class,
            ProductImagesSeeder::class,
        ]);

        // 3. Users & related
        $this->call([
            UsersSeeder::class,
            UserAddressSeeder::class,
        ]);

        // 4. Cart (butuh users & products)
        $this->call([
            CartsSeeder::class,
            CartItemsSeeder::class,
        ]);

        // 5. Orders + related
        $this->call([
            OrdersSeeder::class,
            OrderItemSeeder::class,
            PaymentsSeeder::class,
            ShipmentSeeder::class,
        ]);

        // 6. Riwayat + review
        $this->call([
            OrderStatusHistorySeeder::class,
            ReviewsSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}