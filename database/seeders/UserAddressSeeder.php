<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Hapus data lama (aman untuk development)
        DB::table('user_addresses')->delete();

        $users = DB::table('users')->select('id', 'name', 'phone')->get();

        if ($users->isEmpty()) {
            return;
        }

        $faker = Faker::create('id_ID');

        $inserts = [];

        foreach ($users as $user) {
            // Buat 1-2 alamat per user, pastikan hanya satu yang is_default = true
            $count = rand(1, 2);
            for ($i = 0; $i < $count; $i++) {
                $label = $i === 0 ? $faker->optional(0.8)->word() ?? 'Rumah' : $faker->optional(0.7)->word() ?? 'Kantor';
                $recipientName = $faker->name();
                $phone = $user->phone ?: $faker->phoneNumber();
                // sanitize dan limit panjang phone sesuai kolom (32)
                $phone = substr(preg_replace('/[^\d+]/', '', $phone), 0, 32);

                // Bangun alamat tanpa secondaryAddress (tidak tersedia di id_ID)
                $addressText = $faker->streetAddress();
                $extra = $faker->optional(0.6)->randomElement([
                    'No. ' . $faker->buildingNumber(),
                    'Blok ' . $faker->bothify('??-##'),
                    'Komplek ' . $faker->word() . ' ' . $faker->bothify('##'),
                    null,
                ]);
                if ($extra) {
                    $addressText .= ' ' . $extra;
                }
                $city = $faker->city();
                $province = $faker->state();
                $postal = $faker->postcode();

                $inserts[] = [
                    'user_id' => $user->id,
                    'label' => $label,
                    'recipient_name' => $recipientName,
                    'phone' => $phone,
                    'address_text' => $addressText,
                    'city' => $city,
                    'province' => $province,
                    'postal_code' => $postal,
                    'is_default' => $i === 0 ? true : false,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        if (!empty($inserts)) {
            // Insert in chunks untuk menghindari payload besar
            foreach (array_chunk($inserts, 100) as $chunk) {
                DB::table('user_addresses')->insert($chunk);
            }
        }
    }
}
