<?php

namespace Database\Seeders;

use App\Models\MartCategory;
use App\Models\MartProduct;
use Illuminate\Database\Seeder;

class MartSeeder extends Seeder
{
    public function run(): void
    {
        // FOOD
        $food = MartCategory::create([
            'category_name' => 'Makanan'
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Kanzler Cheese Frankfurter (Sosis Keju) 360g',
            'price' => 60000,
            'picture' => 'mart_img/sosis_kanzler.jpg',
            'stock' => 65
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'So Good Chicken Nugget Alphabet 400g',
            'price' => 50000,
            'picture' => 'mart_img/nugget_sogood.jpg',
            'stock' => 75
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Sari Roti Roti Tawar Gandum Kupas 200g',
            'price' => 25000,
            'picture' => 'mart_img/sari_roti.jpg',
            'stock' => 55
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Nissin Wafer Chocolate 570g',
            'price' => 52000,
            'picture' => 'mart_img/nissin_wafer.jpg',
            'stock' => 50
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Pisang Sunpride Cavendish Single',
            'price' => 5000,
            'picture' => 'mart_img/pisang.jpg',
            'stock' => 44
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Jeruk Gerga Lebong Manis',
            'price' => 30000,
            'picture' => 'mart_img/jeruk.jpg',
            'stock' => 45
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Lotte Choco Pie Marshmallow',
            'price' => 20000,
            'picture' => 'mart_img/chocopie.jpg',
            'stock' => 55
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Kiko Ice Stick Assorted 10x70ml',
            'price' => 22000,
            'picture' => 'mart_img/kiko.jpg',
            'stock' => 60
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Indomie Mi Instan Goreng Jumbo Special 129g',
            'price' => 4000,
            'picture' => 'mart_img/indomie.jpg',
            'stock' => 100
        ]);

        // DRINK
        $drink = MartCategory::create([
            'category_name' => 'Minuman'
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Aqua 600ml',
            'price' => 4000,
            'picture' => 'mart_img/aqua.jpg',
            'stock' => 100
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Le Minerale Air Mineral 600ml',
            'price' => 4000,
            'picture' => 'mart_img/le_minerale.jpg',
            'stock' => 100
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Coca Cola Soft Drink 1L',
            'price' => 10000,
            'picture' => 'mart_img/coca_cola.jpg',
            'stock' => 90
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Fanta Soft Drink Strawberry 1L',
            'price' => 10000,
            'picture' => 'mart_img/fanta.jpg',
            'stock' => 85
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Teh Botol Sosro Jasmine Tea 450ml',
            'price' => 7800,
            'picture' => 'mart_img/teh_botol.jpg',
            'stock' => 77
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Nu Green Tea Honey 450ml',
            'price' => 7000,
            'picture' => 'mart_img/nu_greentea.jpg',
            'stock' => 55
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Ito En Oi Ocha Green Tea 500ml',
            'price' => 10000,
            'picture' => 'mart_img/ito_en.jpg',
            'stock' => 45
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Susu Coklat UHT UltraMilk 200ml',
            'price' => 6500,
            'picture' => 'mart_img/ultramilk.jpg',
            'stock' => 88
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Susu UHT Strawberry Binggrae 200ml',
            'price' => 20000,
            'picture' => 'mart_img/binggrae.jpg',
            'stock' => 65
        ]);

        // BahanDapur
        $kitchen = MartCategory::create([
            'category_name' => 'Bahan Dapur'
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Sumo Beras Premium',
            'price' => 94000,
            'picture' => 'mart_img/sumo.jpg',
            'stock' => 77
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Minyak Goreng Tropical 1L',
            'price' => 24000,
            'picture' => 'mart_img/tropical.jpg',
            'stock' => 50
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Dolpin Garam Meja 200g',
            'price' => 10000,
            'picture' => 'mart_img/garam.jpg',
            'stock' => 80
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Koepoe Koepoe Lada Halus Putih 85g',
            'price' => 32000,
            'picture' => 'mart_img/lada.jpg',
            'stock' => 68
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Mamasuka Tepung Roti 100g',
            'price' => 10000,
            'picture' => 'mart_img/mamasuka.jpg',
            'stock' => 55
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Ajinomoto Tepung Bumbu Sajiku Serbaguna',
            'price' => 8000,
            'picture' => 'mart_img/tepung_ajinomoto.jpg',
            'stock' => 55
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Dua Belibis Saus Cabe Pedas Lada 235ml',
            'price' => 18000,
            'picture' => 'mart_img/belibis.jpg',
            'stock' => 88
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Anchor New Zealand Butter Unsalted 230g',
            'price' => 70000,
            'picture' => 'mart_img/anchor.jpg',
            'stock' => 30
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Kraft Keju Cheddar Box 150g',
            'price' => 28000,
            'picture' => 'mart_img/kraft.jpg',
            'stock' => 55
        ]);

       // Obat
        $medicine= MartCategory::create([
            'category_name' => 'Obat-Obatan'
        ]);

        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Tolak Angin Sido Muncul',
            'price' => 6000,
            'picture' => 'mart_img/tolakangin.jpeg',
            'stock' => 50 
        ]);


        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Im-Boost',
            'price' => 24000,
            'picture' => 'mart_img/imboost.jpeg',
            'stock' => 64 
        ]);
 
        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Enervon-C',
            'price' => 8000,
            'picture' => 'mart_img/enervonc.jpeg',
            'stock' => 45
        ]);
 
        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'CDR Vitamin C',
            'price' => 12000,
            'picture' => 'mart_img/cdr.jpeg',
            'stock' => 77
        ]);
 
        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Panadol',
            'price' => 14000,
            'picture' => 'mart_img/panadol.jpeg',
            'stock' => 80
        ]);
 
        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Promag',
            'price' => 11000,
            'picture' => 'mart_img/promag.jpeg',
            'stock' => 51
        ]);
 
        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Entrostop',
            'price' => 11000,
            'picture' => 'mart_img/entrostop.jpeg',
            'stock' => 32
        ]);
 
        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Sangobion',
            'price' => 27000,
            'picture' => 'mart_img/sangobion.jpeg',
            'stock' => 65
        ]);

        //Kecantikan
        $beauty = MartCategory::create([
            'category_name' => 'Alat Kecantikan'
        ]);

        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Garnier Micellar Cleansing Water Vitamin C 125ml',
            'price' => 43000,
            'picture' => 'mart_img/garnier.jpg',
            'stock' => 45
        ]); 
        
        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Ponds Sunscreen Gel Uv Miracle Hydrate 15g',
            'price' => 40000,
            'picture' => 'mart_img/ponds.jpeg',
            'stock' => 50
        ]);

        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'The Originote Hyalucera Moisturizer 50ml',
            'price' => 50000,
            'picture' => 'mart_img/theoriginote.jpeg',
            'stock' => 37
        ]);

        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Pixy Uv Whitening Concealing Base 01 Nat.Beige 9g',
            'price' => 50000,
            'picture' => 'mart_img/pixy.jpeg',
            'stock' => 63
        ]);

        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Glad2glow Micellar Water Pore Clearing Blueberry 130ml',
            'price' => 30000,
            'picture' => 'mart_img/glad2glow.jpeg',
            'stock' => 80
        ]);

        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Ovale Facial Lotion Perfect Luminous 200ml',
            'price' => 30000,
            'picture' => 'mart_img/ovale.jpeg',
            'stock' => 32
        ]);


        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Selection Kapas Kecantikan 50g',
            'price' => 12000,
            'picture' => 'mart_img/selection.jpeg',
            'stock' => 32
        ]);


        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Nivea Lip & Cheek Caring Color Coral 4.8g',
            'price' => 43000,
            'picture' => 'mart_img/nivea.jpeg',
            'stock' => 48
        ]);

        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Viva Eye Brow Pencil 1.3g',
            'price' => 47000,
            'picture' => 'mart_img/viva.jpeg',
            'stock' => 54
        ]);
    }
}
