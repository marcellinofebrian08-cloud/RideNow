<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\dRestaurant;

class DineInSeeder extends Seeder
{
    public function run(): void
    {
        dRestaurant::create([
            'name' => 'Ayam Geybok Bang Jarwo',
            'image' => 'ayam-geybok.jpg',
            'address' => 'Jl. Tanjung Gedong No.21, Jakarta',
            'rating' => 4.9
        ]);

        dRestaurant::create([
            'name' => 'Starbucks',
            'image' => 'starbucks.jpg',
            'address' => 'Mall Ciputra, Jakarta',
            'rating' => 5
        ]);

        dRestaurant::create([
            'name' => 'Pizza Hut',
            'image' => 'pizza-hut.jpg',
            'address' => 'Jl. Danau Sunter Utara, Jakarta',
            'rating' => 4.8
        ]);
    }
}