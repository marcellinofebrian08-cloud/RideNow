<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Menu;
use App\Models\OrderHistory;
use App\Models\Wallet; 
use App\Models\History;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $pilih_lokasi = $request->query('location', 'UNTAR');

        if ($pilih_lokasi == 'UNTAR') {
            $listId = [1, 2, 3, 4, 5]; 
        } else {
            $listId = [6, 7, 8, 9, 10]; 
        }

        session()->put('lokasi_sekarang', $pilih_lokasi);

        $restaurants = Restaurant::whereIn('id', $listId)->get();

        return view('food.index', compact('restaurants', 'pilih_lokasi'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::with('menus')->findOrFail($id);
        return view('food.show', compact('restaurant'));
    }

    public function addToCart(Request $request, $id)
    {
        $menu = Menu::with('restaurant')->findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "menu_name" => $menu->menu_name,
                "quantity"  => 1,
                "price"     => $menu->price,
                "picture"   => $menu->picture,
                "restaurant_id" => $menu->restaurant_id
            ];
        }

        // session()->put('lokasi_sekarang', $menu->restaurant->location ?? 'UNTAR');

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Makanan berhasil dimasukkan ke keranjang!');
    }

    public function removeItem($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        if (empty($cart)) {
            session()->forget('lokasi_sekarang');
            return redirect()->route('food.index')->with('success', 'Semua item telah dihapus dari keranjang.');
        }

        return redirect()->back()->with('success', 'Makanan berhasil dihapus dari keranjang!');
    }

    public function showReceipt()
    {
        $cart = session()->get('cart', []);
        
        $ongkir = 10000; 

        if (!empty($cart)) {
            $first_item = reset($cart);
            $resto_id = $first_item['restaurant_id'] ?? 0;

            $list_id_untar = [1, 2, 3, 4, 5];

            if (in_array($resto_id, $list_id_untar)) {
                $ongkir = 12000;
            } else {
                $ongkir = 10000;
            }
        }

        $total_harga_makanan = 0;
        foreach ($cart as $item) {
            $total_harga_makanan += $item['price'] * $item['quantity'];
        }

        $harga_akhir = $total_harga_makanan + $ongkir;

        $user_id = 1;
        $wallet = Wallet::firstOrCreate(
            ['user_id' => $user_id],
            ['balance' => 0]
        );
        $saldo_sekarang = $wallet->balance; 

        $saldo_cukup = $saldo_sekarang >= $harga_akhir;

        return view('food.receipt', compact('cart', 'total_harga_makanan', 'ongkir', 'harga_akhir', 'saldo_sekarang', 'saldo_cukup'));
    }


    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('food.index')->with('error', 'Keranjang Anda kosong!');
        }

        $ongkir = 10000;
        $first_item = reset($cart);
        $resto_id = $first_item['restaurant_id'] ?? 0;
        $list_id_untar = [1, 2, 3, 4, 5];

        if (in_array($resto_id, $list_id_untar)) {
            $ongkir = 12000;
        } else {
            $ongkir = 10000;
        }

        $total_harga_makanan = 0;
        foreach ($cart as $item) {
            $total_harga_makanan += $item['price'] * $item['quantity'];
        }
        
        $harga_akhir = $total_harga_makanan + $ongkir;

        $user_id = 1;
        $wallet = Wallet::where('user_id', $user_id)->first();

        if (!$wallet || $wallet->balance < $harga_akhir) {
            return redirect()->route('food.showReceipt')->with('error', 'Gagal memproses! Saldo Wallet Anda tidak mencukupi.');
        }

        $wallet->balance = $wallet->balance - $harga_akhir;
        $wallet->save();

        History::create([
            'user_id'           => $user_id,
            'transaction_type'  => 'Pembayaran Food',
            'description'       => 'Pembayaran pesanan makanan di aplikasi',
            'amount'            => $harga_akhir,
            'status'            => 'Success'
        ]);

        $resto_name = $request->input('resto_name', 'Restoran Pilihan');
        OrderHistory::create([
            'resto_name'  => $resto_name,
            'total_price' => $harga_akhir
        ]);

        session()->forget(['cart', 'lokasi_sekarang']);

        return redirect()->route('food.history')->with('success', 'Pesanan berhasil diproses! Driver sedang jalan.');
    }

    public function history()
    {
        $histories = OrderHistory::latest()->get();
        return view('food.history', compact('histories'));
    }

    public function clearCart()
    {
        session()->forget(['cart', 'lokasi_sekarang']);
        return redirect()->route('food.index')->with('success', 'Keranjang belanja berhasil dikosongkan.');
    }
}