<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PartnerSeeder extends Seeder
{
    /**
     * Mengisi tabel partners dengan data dummy menggunakan Faker.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $companies = [
            'Tokopedia', 'Gojek', 'Traveloka', 'Bukalapak', 'OVO',
            'Dana', 'Shopee Indonesia', 'Blibli', 'Tiket.com', 'Ruangguru',
        ];

        for ($i = 0; $i < 5; $i++) {
            \App\Models\Partner::create([
                'name'     => $companies[$i] . ' ' . $faker->companySuffix(),
                'logo_url' => 'https://placehold.co/200x200?text=' . urlencode($companies[$i]),
            ]);
        }
    }
}
