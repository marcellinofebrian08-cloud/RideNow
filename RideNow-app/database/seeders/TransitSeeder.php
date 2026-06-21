<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransitSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transits')->insert([
            [
                'name' => 'Bus Bogor - Bandung',
                'image' => 'bus.jpg',
                'origin' => 'Bogor',
                'destination' => 'Bandung',
                'price' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Kereta Jakarta Kota - Bogor',
                'image' => 'kereta.jpg',
                'origin' => 'Jakarta Kota',
                'destination' => 'Bogor',
                'price' => 12000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Travel Jakarta - Bandung',
                'image' => 'travel.jpg',
                'origin' => 'Jakarta',
                'destination' => 'Bandung',
                'price' => 140000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
