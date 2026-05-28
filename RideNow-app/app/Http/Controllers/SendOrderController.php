<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SendOrder;
use App\Models\Wallet;

class SendOrderController extends Controller
{
    public function sendCreate()
    {
        $userId = 1;

        $wallet = Wallet::firstOrCreate(
            ['user_id' => $userId],
            ['balance' => 0]
        );

        return view('send.create', compact('wallet')); 
    }

    public function sendStore(Request $request)
    {
        $distance = $request->distance; 
        $totalPrice = $distance * 4000; // Tarif flat Send Rp 4.000 / KM

        $userId = 1;

        $wallet = Wallet::firstOrCreate(
            ['user_id' => $userId],
            ['balance' => 0]
        );

        if ($wallet->balance < $totalPrice) {
            return redirect('/send')->with('error', 'Saldo tidak cukup, silakan top up terlebih dahulu!');
        }

        // Simulasi Data Kurir Acak
        $drivers = [
            ['name' => 'Eko', 'plate' => 'B 4444 TAR'], 
            ['name' => 'Siti', 'plate' => 'B 7777 FIT']
        ];
        $pick = $drivers[rand(0, 1)];

        $data = [
            'sender_name' => $request->sender_name,
            'receiver_name' => $request->receiver_name,
            'pickup_location' => $request->pickup_location,
            'destination' => $request->destination,
            'distance' => $distance,
            'item_name' => $request->item_name,
            'price' => $totalPrice, 
            'status' => 'Accepted', 
            'driver_name' => $pick['name'],
            'plate_number' => $pick['plate']
        ];

        $order = SendOrder::create($data);
        if ($order) {
            $wallet->balance = $wallet->balance - $totalPrice;
            $wallet->save();

            // Redirect menggunakan named route persis seperti ride
            return redirect()->route('send.tracking', $order->id)->with([
                'success' => 'Order Pengiriman Berhasil Dibuat! Saldo wallet berhasil dipotong.'
            ]);
        }

        return back()->with('error', 'Failed to create send order');
    }

    public function sendTracking($id)
    {
        $order = SendOrder::findOrFail($id);
        return view('send.ordering', compact('order'));
    }

    public function sendCancel($id)
    {
        $order = SendOrder::findOrFail($id);

        if ($order->status == 'Accepted') {
            $userId = 1;
            $wallet = Wallet::where('user_id', $userId)->first();
            if ($wallet) {
                $wallet->balance = $wallet->balance + $order->price;
                $wallet->save();
            }

            $order->update(['status' => 'Canceled']);

            return redirect('/send')->with('success', 'Pesanan berhasil dibatalkan! Saldo telah dikembalikan.');
        }

        return back()->with('error', 'Pesanan tidak dapat dibatalkan.');
    }

    public function sendComplete($id)
    {
        $order = SendOrder::findOrFail($id);

        if ($order->status == 'Accepted') {
            $order->update(['status' => 'Completed']);

            return redirect('/send')->with('success', 'Pengiriman barang selesai! Terima kasih telah menggunakan RideNow.');
        }

        return back()->with('error', 'Gagal menyelesaikan pengiriman.');
    }
}