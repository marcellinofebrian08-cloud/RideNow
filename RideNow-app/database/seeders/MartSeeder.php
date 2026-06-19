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
            'picture' => 'mart_img/sosis_kanzler.jpg'
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'So Good Chicken Nugget Alphabet 400g',
            'price' => 50000,
            'picture' => 'mart_img/nugget_sogood.jpg'
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Sari Roti Roti Tawar Gandum Kupas 200g',
            'price' => 25000,
            'picture' => 'mart_img/sari_roti.jpg'
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Nissin Wafer Chocolate 570g',
            'price' => 52000,
            'picture' => 'mart_img/nissin_wafer.jpg'
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Pisang Sunpride Cavendish Single',
            'price' => 5000,
            'picture' => 'mart_img/pisang.jpg'
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Jeruk Gerga Lebong Manis',
            'price' => 30000,
            'picture' => 'mart_img/jeruk.jpg'
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Lotte Choco Pie Marshmallow',
            'price' => 20000,
            'picture' => 'mart_img/chocopie.jpg'
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Kiko Ice Stick Assorted 10x70ml',
            'price' => 22000,
            'picture' => 'mart_img/kiko.jpg'
        ]);

        MartProduct::create([
            'category_id' => $food->id,
            'product_name' => 'Indomie Mi Instan Goreng Jumbo Special 129g',
            'price' => 4000,
            'picture' => 'mart_img/indomie.jpg'
        ]);

        // DRINK
        $drink = MartCategory::create([
            'category_name' => 'Minuman'
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Aqua 600ml',
            'price' => 4000,
            'picture' => 'mart_img/aqua.jpg'
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Le Minerale Air Mineral 600ml',
            'price' => 4000,
            'picture' => 'mart_img/le_minerale.jpg'
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Coca Cola Soft Drink 1L',
            'price' => 10000,
            'picture' => 'mart_img/coca_cola.jpg'
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Fanta Soft Drink Strawberry 1L',
            'price' => 10000,
            'picture' => 'mart_img/fanta.jpg'
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Teh Botol Sosro Jasmine Tea 450ml',
            'price' => 7800,
            'picture' => 'mart_img/teh_botol.jpg'
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Nu Green Tea Honey 450ml',
            'price' => 7000,
            'picture' => 'mart_img/nu_greentea.jpg'
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Ito En Oi Ocha Green Tea 500ml',
            'price' => 10000,
            'picture' => 'mart_img/ito_en.jpg'
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Susu Coklat UHT UltraMilk 200ml',
            'price' => 6500,
            'picture' => 'mart_img/ultramilk.jpg'
        ]);

        MartProduct::create([
            'category_id' => $drink->id,
            'product_name' => 'Susu UHT Strawberry Binggrae 200ml',
            'price' => 20000,
            'picture' => 'mart_img/binggrae.jpg'
        ]);

        // BahanDapur
        $kitchen = MartCategory::create([
            'category_name' => 'Bahan Dapur'
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Sumo Beras Premium',
            'price' => 94000,
            'picture' => 'mart_img/sumo.jpg'
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Minyak Goreng Tropical 1L',
            'price' => 24000,
            'picture' => 'mart_img/tropical.jpg'
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Dolpin Garam Meja 200g',
            'price' => 10000,
            'picture' => 'mart_img/garam.jpg'
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Koepoe Koepoe Lada Halus Putih 85g',
            'price' => 32000,
            'picture' => 'mart_img/lada.jpg'
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Mamasuka Tepung Roti 100g',
            'price' => 10000,
            'picture' => 'mart_img/mamasuka.jpg'
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Ajinomoto Tepung Bumbu Sajiku Serbaguna',
            'price' => 8000,
            'picture' => 'mart_img/tepung_ajinomoto.jpg'
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Dua Belibis Saus Cabe Pedas Lada 235ml',
            'price' => 18000,
            'picture' => 'mart_img/belibis.jpg'
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Anchor New Zealand Butter Unsalted 230g',
            'price' => 70000,
            'picture' => 'mart_img/anchor.jpg'
        ]);

        MartProduct::create([
            'category_id' => $kitchen->id,
            'product_name' => 'Kraft Keju Cheddar Box 150g',
            'price' => 28000,
            'picture' => 'mart_img/kraft.jpg'
        ]);

       // Obat
        $medicine= MartCategory::create([
            'category_name' => 'Obat-Obatan'
        ]);

        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Tolak Angin Sido Muncul',
            'price' => 6000,
            'picture' => 'mart_img/tolakangin.jpeg'
        ]);


        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Im-Boost',
            'price' => 24000,
            'picture' => 'mart_img/imboost.jpeg'
        ]);
 
        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Enervon-C',
            'price' => 8000,
            'picture' => 'mart_img/enervonc.jpeg'
        ]);
 
        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'CDR Vitamin C',
            'price' => 12000,
            'picture' => 'mart_img/cdr.jpeg'
        ]);
 
        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Panadol',
            'price' => 14000,
            'picture' => 'mart_img/panadol.jpeg'
        ]);
 
        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Promag',
            'price' => 11000,
            'picture' => 'mart_img/promag.jpeg'
        ]);
 
        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Entrostop',
            'price' => 11000,
            'picture' => 'mart_img/entrostop.jpeg'
        ]);
 
        MartProduct::create([
            'category_id' => $medicine->id,
            'product_name' => 'Sangobion',
            'price' => 27000,
            'picture' => 'mart_img/sangobion.jpeg'
        ]);

        //Kecantikan
        $beauty = MartCategory::create([
            'category_name' => 'Alat Kecantikan'
        ]);

        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Garnier Micellar Cleansing Water Vitamin C 125ml',
            'price' => 43000,
            'picture' => 'mart_img/garnier.jpg'
        ]); 
        
        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Ponds Sunscreen Gel Uv Miracle Hydrate 15g',
            'price' => 40000,
            'picture' => 'mart_img/ponds.jpeg'
        ]);

        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'The Originote Hyalucera Moisturizer 50ml',
            'price' => 50000,
            'picture' => 'mart_img/theoriginote.jpeg'
        ]);

        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Pixy Uv Whitening Concealing Base 01 Nat.Beige 9g',
            'price' => 50000,
            'picture' => 'mart_img/pixy.jpeg'
        ]);

        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Glad2glow Micellar Water Pore Clearing Blueberry 130ml',
            'price' => 30000,
            'picture' => 'mart_img/glad2glow.jpeg'
        ]);

        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Ovale Facial Lotion Perfect Luminous 200ml',
            'price' => 30000,
            'picture' => 'mart_img/ovale.jpeg'
        ]);


        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Selection Kapas Kecantikan 50g',
            'price' => 12000,
            'picture' => 'mart_img/selection.jpeg'
        ]);


        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Nivea Lip & Cheek Caring Color Coral 4.8g',
            'price' => 43000,
            'picture' => 'mart_img/nivea.jpeg'
        ]);

        MartProduct::create([
            'category_id' => $beauty->id,
            'product_name' => 'Viva Eye Brow Pencil 1.3g',
            'price' => 47000,
            'picture' => 'mart_img/viva.jpeg',
        ]);

        // Kebutuhan Rumah Tangga
        $house= MartCategory::create([
            'category_name' => 'Kebutuhan Rumah Tangga'
        ]);


        MartProduct::create([
            'category_id' => $house->id,
            'product_name' => 'So Klin Detergent Cair Softergent Sakura Strawberry 1600ml',
            'price' => 36000,
            'picture' => 'mart_img/soklin.jpeg'
        ]);


        MartProduct::create([
            'category_id' => $house->id,
            'product_name' => 'Sunlight Pencuci Piring Lime 1.5l',
            'price' => 27000,
            'picture' => 'mart_img/sunlight.jpeg'
         ]);


        MartProduct::create([
            'category_id' => $house->id,
            'product_name' => 'Paseo Facial Tissue Ultra Soft',
            'price' => 17000,
            'picture' => 'mart_img/paseo.jpeg'
        ]);


        MartProduct::create([
            'category_id' => $house->id,
            'product_name' => 'Dettol Antiseptic Wet Wipes',
            'price' => 17000,
            'picture' => 'mart_img/dettol.jpeg'
        ]);


        MartProduct::create([
            'category_id' => $house->id,
            'product_name' => 'Baygon Insektisida Spray Citrus Fresh 400ml',
            'price' => 34000,
            'picture' => 'mart_img/baygon.jpeg'
        ]);


        MartProduct::create([
            'category_id' => $house->id,
            'product_name' => 'Lifebuoy Antibacterial Handwash 200ml',
            'price' => 23000,
            'picture' => 'mart_img/lifebuoy.jpeg'
        ]);


        MartProduct::create([
            'category_id' => $house->id,
            'product_name' => 'Wipol Karbol Wangi Cemara 750ml',
            'price' => 16000,
            'picture' => 'mart_img/wipol.jpeg'
        ]);


        MartProduct::create([
            'category_id' => $house->id,
            'product_name' => 'Giv Body Wash Flower & Berry 825ml',
            'price' => 40000,
            'picture' => 'mart_img/giv.jpeg'
        ]);


        MartProduct::create([
            'category_id' => $house->id,
            'product_name' => 'Selsun Shampoo Anti-Dandruf Blue 120ml',
            'price' => 50000,
            'picture' => 'mart_img/selsun.jpeg'
        ]);
    }
}
