<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provinsi::factory()->count(38)->sequence(
            ['name' => 'Nanggroe Aceh Darussalam'],
            ['name' => 'Sumatera Utara'],
            ['name' => 'Sumatera Selatan'],
            ['name' => 'Sumatera Barat'],
            ['name' => 'Bengkulu'],
            ['name' => 'Riau'],
            ['name' => 'Kepulauan Riau'],
            ['name' => 'Jambi'],
            ['name' => 'Lampung'],
            ['name' => 'Bangka Belitung'],
            ['name' => 'Kalimantan Barat'],
            ['name' => 'Kalimantan Timur'],
            ['name' => 'Kalimantan Selatan'],
            ['name' => 'Kalimantan Tengah'],
            ['name' => 'Kalimantan Utara'],
            ['name' => 'Banten'],
            ['name' => 'DKI Jakarta'],
            ['name' => 'Jawa Barat'],
            ['name' => 'Jawa Tengah'],
            ['name' => 'Daerah Istimewa Yogyakarta'],
            ['name' => 'Jawa Timur'],
            ['name' => 'Bali'],
            ['name' => 'Nusa Tenggara Timur'],
            ['name' => 'Nusa Tenggara Barat'],
            ['name' => 'Gorontalo'],
            ['name' => 'Sulawesi Barat'],
            ['name' => 'Sulawesi Tengah'],
            ['name' => 'Sulawesi Utara'],
            ['name' => 'Sulawesi Tenggara'],
            ['name' => 'Sulawesi Selatan'],
            ['name' => 'Maluku Utara'],
            ['name' => 'Maluku'],
            ['name' => 'Papua Barat'],
            ['name' => 'Papua'],
            ['name' => 'Papua Tengah'],
            ['name' => 'Papua Pegunungan'],
            ['name' => 'Papua Selatan'],
            ['name' => 'Papua Barat Daya']
        )->create();
    }
}
