<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserAddressSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        // Pastikan user id 1 & 2 ada. Jika tidak, sesuaikan.
        $data = [
            [
                'user_id' => 1,
                'label' => 'Rumah',
                'recipient_name' => 'User Satu',
                'phone' => '081234567890',
                'address_text' => 'Jl. Mawar No. 10',
                'city' => 'Jakarta',
                'province' => 'DKI Jakarta',
                'postal_code' => '10110',
                'country' => 'Indonesia',
                'is_default' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'label' => 'Kantor',
                'recipient_name' => 'User Satu',
                'phone' => '081234567891',
                'address_text' => 'Gedung Kantor Lantai 5',
                'city' => 'Jakarta',
                'province' => 'DKI Jakarta',
                'postal_code' => '10220',
                'country' => 'Indonesia',
                'is_default' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'label' => 'Apartemen',
                'recipient_name' => 'User Dua',
                'phone' => '081298765432',
                'address_text' => 'Tower B Unit 12A',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'postal_code' => '40123',
                'country' => 'Indonesia',
                'is_default' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($data as $row) {
            DB::table('user_addresses')->updateOrInsert(
                ['user_id' => $row['user_id'], 'address_text' => $row['address_text']],
                $row
            );
        }
    }
}