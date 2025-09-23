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

        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            ProductImagesTableSeeder::class,
            CartsTableSeeder::class,
            OrdersTableSeeder::class,
            OrderItemsTableSeeder::class,
            PaymentsTableSeeder::class,
            ShipmentsTableSeeder::class,
            CartItemsTableSeeder::class,
            OrderStatusSeeder::class,
            CouponSeeder::class,
            UserAddressSeeder::class,
            ReviewSeeder::class,
            OrderStatusHistorySeeder::class,
        ]);
    }
}
