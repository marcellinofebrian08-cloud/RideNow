<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\dRestaurant;

class DineInSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('d_categories')->insert([
            [
                'name' => 'Cafe',
                'icon' => 'cafe.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seafood',
                'icon' => 'seafood.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Japanese',
                'icon' => 'japanese.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('d_restaurants')->insert([
            [
                'name' => 'Sushi Go',
                'image' => 'sushi.jpg',
                'address' => 'Mall Emporium',
                'rating' => 4.3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seafood Ayu 69',
                'image' => 'resto2.jpg',
                'address' => 'Ruko Cordoba Blok F No 17',
                'rating' => 4.4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wakofi',
                'image' => 'cafe1.jpg',
                'address' => 'Jl Mawar No 7',
                'rating' => 4.7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('d_food')->insert([
            [
                'restaurant_id' => 1,
                'category_id' => 3,
                'name' => 'Sushi Salmon',
                'price' => 45000,
                'image' => 'food1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'restaurant_id' => 1,
                'category_id' => 3,
                'name' => 'Ramen Jepang',
                'price' => 35000,
                'image' => 'food2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'restaurant_id' => 2,
                'category_id' => 2,
                'name' => 'Kepiting Saus Padang',
                'price' => 120000,
                'image' => 'food3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'restaurant_id' => 2,
                'category_id' => 2,
                'name' => 'Udang Bakar',
                'price' => 80000,
                'image' => 'food4.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'restaurant_id' => 3,
                'category_id' => 1,
                'name' => 'Cappuccino',
                'price' => 25000,
                'image' => 'coffee1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'restaurant_id' => 3,
                'category_id' => 1,
                'name' => 'Latte',
                'price' => 28000,
                'image' => 'coffee2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('d_vouchers')->insert([
            [
                'title' => 'Voucher 100k',
                'discount' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cashback 100k',
                'discount' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('d_banners')->insert([
            [
                'title' => 'Promo Sushi',
                'image' => 'banner1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Promo Seafood',
                'image' => 'banner2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
