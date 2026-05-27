<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        // Restoran 1
        $resto1 = Restaurant::create([
            'resto_name' => 'Ayam Geybok Bang Jarwo',
            'category' => 'Ayam Geprek',
            'location' => 'Jl. Tanjung Gedong No.21, Tomang, Grogol Petamburan, Jakarta',
            'rating' => 4.9
        ]);

        Menu::create([
            'restaurant_id' => $resto1->id,
            'menu_name' => 'Paket Ayam BlonKrik',
            'description' => 'Nasi ayam cripsy tanpa tulang + Sambal Geybok + Keju + Lalapan',
            'price' => 35000
        ]);
        Menu::create([
            'restaurant_id' => $resto1->id,
            'menu_name' => 'Paket Ayam Blonde',
            'description' => 'Nasi ayam tanpa tulang + Sambal Geybok + Keju + Lalapan',
            'price' => 32000
        ]);
        Menu::create([
            'restaurant_id' => $resto1->id,
            'menu_name' => 'Paket Ayam Blonde Matah',
            'description' => 'Nasi ayam tanpa tulang + Sambal Geybok + Sambal Matah + Keju + Lalapan',
            'price' => 39000
        ]);
        Menu::create([
            'restaurant_id' => $resto1->id,
            'menu_name' => 'Paket Ayam Geybok',
            'description' => 'Nasi ayam + Sambal + Tahu/Tempe + Kerupuk + Lalapan',
            'price' => 32000
        ]);
        Menu::create([
            'restaurant_id' => $resto1->id,
            'menu_name' => 'Paket Ayam Blonde',
            'description' => 'Nasi ayam tanpa tulang + Sambal Geybok + Keju + Lalapan',
            'price' => 32000
        ]);


        $resto2 = Restaurant::create([
            'resto_name' => 'Starbucks',
            'category' => 'Kopi',
            'location' => 'Gedung Mal Ciputra, Lantai LG, Unit 17A, Jl. Arteri S Parman, Grogol, Jakarta',
            'rating' => 5
        ]);

        Menu::create([
            'restaurant_id' => $resto2->id,
            'menu_name' => 'Caffe Latte',
            'description' => 'Minuman ini TIDAK mengandung gula',
            'price' => 50000
        ]);
        Menu::create([
            'restaurant_id' => $resto2->id,
            'menu_name' => 'Hazelnut Latte',
            'description' => 'Kopi dengan sirup hazelnut',
            'price' => 58000
        ]);
        Menu::create([
            'restaurant_id' => $resto2->id,
            'menu_name' => 'Salted Caramel Macchiatto',
            'description' => 'Kopi dengan saus salted caramel',
            'price' => 58000
        ]);
        Menu::create([
            'restaurant_id' => $resto2->id,
            'menu_name' => 'Americano',
            'description' => 'Minuman ini TIDAK mengandung gula',
            'price' => 42000
        ]);
        Menu::create([
            'restaurant_id' => $resto2->id,
            'menu_name' => 'Iced Strawberry Acai Lemonade',
            'description' => 'Non Coffee. Minuman dengan campuran buah lemon dan stroberi.',
            'price' => 50000
        ]);
        Menu::create([
            'restaurant_id' => $resto2->id,
            'menu_name' => 'Pure Matcha Latte',
            'description' => 'Non Coffee. Minuman ini TIDAK mengandung gula.',
            'price' => 50000
        ]);


        $resto3 = Restaurant::create([
            'resto_name' => 'Nasi Goreng Kambing Kebon Sirih 1958, PHX Grogol',
            'category' => 'Nasi Goreng Kambing',
            'location' => 'Jl. Dr Susilo Raya No. 342, Grogol, Jakarta',
            'rating' => 4.7
        ]);

        Menu::create([
            'restaurant_id' => $resto3->id,
            'menu_name' => 'Nasi Goreng Kambing 1 Porsi',
            'description' => 'Nasi goreng kambing berempah yang gurih.',
            'price' => 75000
        ]);
        Menu::create([
            'restaurant_id' => $resto3->id,
            'menu_name' => 'Nasi Goreng Kambing 1/2 Porsi',
            'description' => 'Nasi goreng kambing 1/2 porsi berempah yang gurih.',
            'price' => 62000
        ]);
        Menu::create([
            'restaurant_id' => $resto3->id,
            'menu_name' => 'Nasi Goreng Kari Kambing',
            'description' => 'Nasi goreng kambing dengan bumbu kari.',
            'price' => 75000
        ]);
        Menu::create([
            'restaurant_id' => $resto3->id,
            'menu_name' => 'Sate Kambing',
            'description' => '8 tusuk sate daging kambing menggunakan bumbu kecap.',
            'price' => 80000
        ]);


        $resto4 = Restaurant::create([
            'resto_name' => 'Mujigae (Casual Korean Food)',
            'category' => 'Makanan & snacks Korea',
            'location' => 'Jl. Rawa Bahagia 1 No. 15, Grogol Petamburan, Roxy, Jakarta',
            'rating' => 4.9
        ]);

        Menu::create([
            'restaurant_id' => $resto4->id,
            'menu_name' => 'Sundubu Jjigae Beef',
            'description' => 'Sup tahu sutra ala Korea dengan daging sapi 33 gr, jamur enoki, daun bawang dan telur dalam kuah hangat pedas gurih.',
            'price' => 65000
        ]);
        Menu::create([
            'restaurant_id' => $resto4->id,
            'menu_name' => 'Bibimbap Beef Bulgogi + 2 Mandu',
            'description' => 'Bibimbap Beef Bulgogi manis gurih lengkap dengan nasi, sayuran segar, saus khas Korea spicy. Paket dilengkapi dengan 2 mandu.',
            'price' => 65000
        ]);   
        Menu::create([
            'restaurant_id' => $resto4->id,
            'menu_name' => 'Classic Topokki',
            'description' => 'Tteok/kue beras (18 pcs) & Eomuk/fish cake (6 pcs). Dimasak dalam saus gochujang yang manis dan sedikit pedas.',
            'price' => 40000
        ]);
        Menu::create([
            'restaurant_id' => $resto4->id,
            'menu_name' => 'Kimchi Fried Rice',
            'description' => 'Nasi Goreng Kimchi Korea, Daging Sapi & Telur. Dimasak dengan kimchi fermentasi khas Korea, ditambah potongan daging sapi dan telur.',
            'price' => 45000
        ]);
        Menu::create([
            'restaurant_id' => $resto4->id,
            'menu_name' => 'Spicy Korean Chicken (Boneless)',
            'description' => 'Korean Boneless Chicken (10 pcs). Ayam goreng tanpa tulang ala Korea yang renyah, juicy, dan penuh rasa.',
            'price' => 53000
        ]);


        $resto5 = Restaurant::create([
            'resto_name' => 'Bellamama',
            'category' => 'Pizza & Pasta',
            'location' => 'Mall Taman Anggrek, Lantai 4, Jl. Tanjung Duren Timur 2, Tanjung Duren, Jakarta',
            'rating' => 4.8
        ]);

        Menu::create([
            'restaurant_id' => $resto5->id,
            'menu_name' => 'Salami Cheese Hot Honey',
            'description' => 'Pizza dengan topping Keju, Salami dan Hot Honey',
            'price' => 107000
        ]);
        Menu::create([
            'restaurant_id' => $resto5->id,
            'menu_name' => 'Beef Bacon Primavera',
            'description' => 'Pizza dengan saus dasar tomat dilengkapi dengan topping Beef Bacon, Daun Aruguala segar dan Grana Padano.',
            'price' => 105000
        ]);
        Menu::create([
            'restaurant_id' => $resto5->id,
            'menu_name' => 'Classic Bolognese Pasta',
            'description' => 'Spageti dengan saus bolognese.',
            'price' => 100000
        ]);
        Menu::create([
            'restaurant_id' => $resto5->id,
            'menu_name' => 'Salmon Flakes Aglio Olio',
            'description' => 'Spageti dengan bumbu minyak bawang pedas disertai topping salmon.',
            'price' => 110000
        ]);
        Menu::create([
            'restaurant_id' => $resto5->id,
            'menu_name' => 'Arrabiata Shrimp Pasta',
            'description' => 'Spageti dengan saus dasar tomat dan cabai kering disertai topping udang segar.',
            'price' => 115000
        ]);


        $resto6 = Restaurant::create([
            'resto_name' => 'HokBen, Food Market Sunter',
            'category' => 'Nasi Bento Jepang',
            'location' => 'Jl. Agung Barat 1 A-3/15, Sunter Agung, Tanjung Priok, Jakarta Utara',
            'rating' => 4.9
        ]);

        Menu::create([
            'restaurant_id' => $resto6->id,
            'menu_name' => 'Gyu Soboro Don',
            'description' => 'Donburi dengan daging cincang dan telur.',
            'price' => 24000
        ]);
        Menu::create([
            'restaurant_id' => $resto6->id,
            'menu_name' => 'Wafu Yakisoba',
            'description' => 'Dry ramen dengan saus wafu dan topping daging cincang.',
            'price' => 24000
        ]);
	    Menu::create([
            'restaurant_id' => $resto6->id,
            'menu_name' => 'Irodori Bento 1',
            'description' => 'Nasi bento dengan egg chicken roll, ekkado, chicken karaage, chicken teriyaki, mayotamayaki, mie aurora dan acar.',
            'price' => 63500
 	    ]);
	    Menu::create([
            'restaurant_id' => $resto6->id,
            'menu_name' => 'Hokkaido Miso Ramen Large',
            'description' => 'Ramen kuah miso dengan topping ayam chasiu, tori soboro, ni tamago, pakcoy, dan jagung.',
            'price' => 50500
    	]);
	    Menu::create([
            'restaurant_id' => $resto6->id,
            'menu_name' => 'Trio Maxi Yakiniku',
            'description' => 'Nasi dengan diced beef teriyaki, chicken dan beef yakiniku, dilengkapi gorengan-gorengan.',
            'price' => 75000
  	    ]);


        $resto7 = Restaurant::create([
            'resto_name' => 'KFC Box, Sunter Kemayoran',
            'category' => 'Fast Food',
            'location' => 'Jl. Sunter Kemayoran No 3, Sunter, Jakarta',
            'rating' => 4.8
        ]);

  	    Menu::create([
            'restaurant_id' => $resto7->id,
            'menu_name' => 'Super Besar 1',
            'description' => 'Paket ayam goreng dan nasi putih dengan minuman.',
            'price' => 41500
	    ]);
  	    Menu::create([
            'restaurant_id' => $resto7->id,
            'menu_name' => 'Winger Bucket',
            'description' => 'Bucket berisi 7pcs chicken wings crispy.',
            'price' => 110000
        ]);
  	    Menu::create([
            'restaurant_id' => $resto7->id,
            'menu_name' => 'Cripsy Burger',
            'description' => 'Burger berisi daging ayam goreng dan selada.',
            'price' => 16000
        ]);
  	    Menu::create([
            'restaurant_id' => $resto7->id,
            'menu_name' => 'Saucify Crunch',
            'description' => '4pcs crispy strips dengan 3 dipping saus.',
            'price' => 40500
        ]);
  	    Menu::create([
            'restaurant_id' => $resto7->id,
            'menu_name' => 'Yakiniku Don',
            'description' => 'Nasi dan ayam goreng dengan saus yakiniku.',
            'price' => 16000
        ]);


        $resto8= Restaurant::create([
            'resto_name' => 'Teazzi',
            'category' => 'Minuman Teh',
            'location' => 'Menara Jakarta, Lantai Lower Ground, Jl. Kota Baru Bandar Kemayoran No. C8, Kemayoran, Jakarta',
            'rating' => 4.8
        ]);

  	    Menu::create([
            'restaurant_id' => $resto8->id,
            'menu_name' => 'Deep Roast Oolong Milk Tea',
            'description' => 'Terbuat dari teh oolong panggang',
            'price' => 41500
	    ]);
        Menu::create([
            'restaurant_id' => $resto8->id,
            'menu_name' => 'Honey Deep Roast Oolong Milk Tea',
            'description' => 'Terbuat dari teh oolong panggang dan madu',
            'price' => 32000
	    ]);
        Menu::create([
            'restaurant_id' => $resto8->id,
            'menu_name' => 'Jamsine Milk Tea',
            'description' => 'Terbuat dari teh jasmine',
            'price' => 33000
	    ]);
        Menu::create([
            'restaurant_id' => $resto8->id,
            'menu_name' => 'Jamsine Green Soy Milk Tea',
            'description' => 'Terbuat dari teh jasmine dan susu kacang',
            'price' => 33000
	    ]);
        Menu::create([
            'restaurant_id' => $resto8->id,
            'menu_name' => 'Deep Prost Oolong',
            'description' => 'Teh oolong tanpa campuran gula',
            'price' => 25000
	    ]);


        $resto9 = Restaurant::create([
            'resto_name' => 'Pizza Hut Ristorante, Danau Sunter Utara',
            'category' => 'Pizza',
            'location' => 'Jl. Danau Sunter Utara No. A3/14, Sunter, Jakarta 10',
            'rating' => 4.9
        ]);
  	  
        Menu::create([
            'restaurant_id' => $resto9->id,
            'menu_name' => 'Suourdough Authentic',
            'description' => 'Topping pizza classic dengan tekstur ringan, renyah, lembut dan kenyal.',
            'price' => 114000
	    ]);
  	    Menu::create([
            'restaurant_id' => $resto9->id,
            'menu_name' => 'New Orleans Chicken Wings',
            'description' => 'Sayap ayam panggang dengan bumbu khas New Orleans',
            'price' => 53000
        ]);
  	    Menu::create([
            'restaurant_id' => $resto9->id,
            'menu_name' => 'PAN Regular Pizza',
            'description' => 'Pizza dengan pilihan crust dan topping untuk 3-4 orang',
            'price' => 130000
        ]);
  	    Menu::create([
            'restaurant_id' => $resto9->id,
            'menu_name' => 'Garlicheese Bread',
            'description' => 'Roti panggang dengan bumbu bawang putih dan keju mozzarella',
            'price' => 37000
        ]);
  	    Menu::create([
            'restaurant_id' => $resto9->id,
            'menu_name' => 'My Box Pizza',
            'description' => 'Personal pizza dengan pilihan snack dan minuman',
            'price' => 65000
        ]);

        
        $resto10 = Restaurant::create([
            'resto_name' => 'Ikkudo Ichi, Sunter',
            'category' => 'Ramen Jepang',
            'location' => 'Jl. Danau Sunter Barat, RT.4/RW.6, Sunter Agung, Kec. Tj. Priok, Jkt Utara, Daerah Khusus Ibukota Jakarta 14350',
            'rating' => 4.8
        ]);
  	  
        Menu::create([
            'restaurant_id' => $resto10->id,
            'menu_name' => 'Tori Tan-Tan',
            'description' => 'Ramen dengan topping ayam dan saus pedas',
            'price' => 76000
	    ]);
  	    Menu::create([
            'restaurant_id' => $resto10->id,
            'menu_name' => 'Buta Signature',
            'description' => 'Ramen dengan topping babi khas Ikkudo',
            'price' => 89000
        ]);
  	    Menu::create([
            'restaurant_id' => $resto10->id,
            'menu_name' => 'Tori Japanese Curry',
            'description' => 'Ramen dengan topping ayam dan kari Jepang',
            'price' => 76000
        ]);
  	    Menu::create([
            'restaurant_id' => $resto10->id,
            'menu_name' => 'Tori Karaagemen',
            'description' => 'Ramen dengan topping ayam karaage',
            'price' => 76000
        ]);
  	    Menu::create([
            'restaurant_id' => $resto10->id,
            'menu_name' => 'Age Tori Gyoza',
            'description' => 'Gyoza dipanggang dengan isi ayam',
            'price' => 50000
        ]);

    }
}