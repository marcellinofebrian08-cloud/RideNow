<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Menu;
use App\Models\OrderHistory;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $selectLocation = $request->query('location', 'UNTAR');

        if ($selectLocation == 'UNTAR') {
            $listId = [1, 2, 3, 4, 5]; 
        } else {
            $listId = [6, 7, 8, 9, 10]; 
        }

        $restaurants = Restaurant::whereIn('id', $listId)->get();

        return view('food.index', compact('restaurants', 'selectLocation'));
    }

    public function show($id)
    {
        $restaurant = Restaurant::with('menus')->findOrFail($id);
        return view('food.show', compact('restaurant'));
    }

    public function addToCart(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "menu_name" => $menu->menu_name,
                "quantity"  => 1,
                "price"     => $menu->price,
                "picture"   => $menu->picture
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Makanan berhasil dimasukkan ke keranjang!');
    }

    public function showReceipt()
    {
        $cart = session()->get('cart', []);
        $ongkir = 10000;
        $total_harga_makanan = 0;

        foreach ($cart as $item) {
            $total_harga_makanan += $item['price'] * $item['quantity'];
        }

        $harga_akhir = $total_harga_makanan + $ongkir;

        return view('food.receipt', compact('cart', 'total_harga_makanan', 'ongkir', 'harga_akhir'));
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('food.index')->with('error', 'Keranjang Anda kosong!');
        }

        $total_harga_makanan = 0;
        foreach ($cart as $item) {
            $total_harga_makanan += $item['price'] * $item['quantity'];
        }
        
        $harga_akhir = $total_harga_makanan + 10000;

        $nama_resto = $request->input('resto_name', 'Restoran Pilihan');

        OrderHistory::create([
            'resto_name'  => $resto_name,
            'total_price' => $harga_akhir
        ]);

        session()->forget('cart');

        return redirect()->route('food.history')->with('success', 'Pesanan berhasil diproses! Driver sedang jalan.');
    }

    public function history()
    {
        $histories = OrderHistory::latest()->get();
        return view('food.history', compact('histories'));
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('food.index')->with('success', 'Keranjang belanja berhasil dikosongkan.');
    }
}