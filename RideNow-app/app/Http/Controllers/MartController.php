<?php

namespace App\Http\Controllers;

use App\Models\MartCategory;
use App\Models\MartProduct;
use App\Models\MartOrderHistory;
use App\Models\Wallet; 
use App\Models\History;
use Illuminate\Http\Request;

class MartController extends Controller
{
    public function index()
    {
        $categories = MartCategory::all();
        return view('mart.index', compact('categories'));
        
    }

    public function showCategory($id)
    {
        $category = MartCategory::findOrFail($id);

        $products = MartProduct::where(
            'category_id',
            $id
        )->get();

        return view(
            'mart.show',
            compact('category', 'products')
        );
    }

    public function addToCart($id)
    {
        $product = MartProduct::findOrFail($id);
        $cart = session()->get('mart_cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;

        } else {

            $cart[$id] = [
                'product_name' => $product->product_name,
                'price' => $product->price,
                'picture' => $product->picture,
                'quantity' => 1,
                'category_id' => $product->category_id
            ];
        }

        session()->put('mart_cart', $cart);

        return redirect()->back()
            ->with(
                'success',
                'Barang berhasil dimasukkan ke keranjang.'
            );
    }

    public function removeItem($id)
    {
    $cart = session()->get(
        'mart_cart',
        []
    );

    if (isset($cart[$id])) {

        unset($cart[$id]);

        session()->put(
            'mart_cart',
            $cart
        );
    }

    return redirect()
        ->back()
        ->with(
            'success',
            'Barang berhasil dihapus.'
        );
    }

    public function showReceipt()
    {
        $cart = session()->get('mart_cart', []);
        $total_harga_barang = 0;

        foreach ($cart as $item) {
            $total_harga_barang +=
                $item['price'] *
                $item['quantity'];
        }

        $ongkir = 10000;

        $harga_akhir =
            $total_harga_barang +
            $ongkir;

        $user_id = 1;

        $wallet = Wallet::firstOrCreate(
            ['user_id' => $user_id],
            ['balance' => 0]
        );

        $saldo_sekarang = $wallet->balance;

        $saldo_cukup =
            $saldo_sekarang >=
            $harga_akhir;

        return view(
            'mart.receipt',
            compact(
                'cart',
                'total_harga_barang',
                'ongkir',
                'harga_akhir',
                'saldo_sekarang',
                'saldo_cukup'
            )
        );
    }   

    public function checkout()
    {
        $cart = session()->get('mart_cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('mart.index')
                ->with(
                    'error',
                    'Keranjang kosong.'
                );
        }

        $total_harga_barang = 0;

        foreach ($cart as $item) {

            $total_harga_barang +=
                $item['price'] *
                $item['quantity'];
        }

        $ongkir = 10000;

        $harga_akhir =
            $total_harga_barang +
            $ongkir;

        $user_id = 1;

        $wallet = Wallet::where(
            'user_id',
            $user_id
        )->first();

        if (
            !$wallet ||
            $wallet->balance < $harga_akhir
        ) {

            return redirect()
                ->route('mart.showReceipt')
                ->with(
                    'error',
                    'Saldo wallet tidak mencukupi.'
                );
        }

        $wallet->balance =
            $wallet->balance -
            $harga_akhir;

        $wallet->save();

        History::create([

            'user_id' => $user_id,

            'transaction_type' =>
                'Pembayaran Mart',

            'description' =>
                'Belanja kebutuhan di RideNow Mart',

            'amount' =>
                $harga_akhir,

            'status' =>
                'Success'
        ]);

        $first_item = reset($cart);

        $category = MartCategory::find(
            $first_item['category_id']
        );

        $category_name = $category
            ? $category->category_name
            : 'Kategori Tidak Diketahui';

        MartOrderHistory::create([

            'category_name' =>
                $category_name,

            'total_price' =>
                $harga_akhir
        ]);

        session()->forget('mart_cart');

        return redirect()
            ->route('mart.history')
            ->with(
                'success',
                'Pesanan berhasil diproses.'
            );
    }


    public function history()
    {
        $histories =
            MartOrderHistory::latest()
            ->get();

        return view(
            'mart.history',
            compact('histories')
        );
    }

    public function clearCart()
    {
    session()->forget(
        'mart_cart'
    );

    return redirect()
        ->route('mart.index')
        ->with(
            'success',
            'Keranjang berhasil dikosongkan.'
        );
    }
}