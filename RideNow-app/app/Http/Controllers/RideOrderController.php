<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RideOrder;
use App\Models\Wallet;
use App\Models\History;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class RideOrderController extends Controller
{
    public function orderCreate()
    { 
        $userId = Auth::id();

        $wallet = Wallet::firstOrCreate(
            ['user_id' => $userId],
            ['balance' => 0]
        );

        $addresses = \App\Models\Address::where('user_id', $userId)->get();

        return view('order.create', compact('wallet', 'addresses')); 
    }

    public function orderStore(Request $request)
    {
        $distance = $request->distance; 
        
        // Tarif per KM: Bike = 3000/KM, Car = 6000/KM
        $pricePerKm = $request->ride_type == 'Bike' ? 3000 : 6000;
        $totalPrice = $distance * $pricePerKm;

        $userId = Auth::id();

        $wallet = Wallet::firstOrCreate(
            ['user_id' => $userId],
            ['balance' => 0]
        );

        if ($wallet->balance < $totalPrice) {
            return redirect('/ride')->with('error', 'Saldo tidak cukup, silakan top up terlebih dahulu!');
        }

        $drivers = [
            ['name' => 'Budi Santoso', 'plate' => 'B 1234 TAR'], 
            ['name' => 'Agus Supriatna', 'plate' => 'B 9999 FIT'],
            ['name' => 'Andi Wijaya', 'plate' => 'B 5678 UNT']
        ];
        $pick = $drivers[rand(0, 2)];

        $data = [
            'passenger_name' => $request->passenger_name,
            'pickup_location' => $request->pickup_location,
            'destination' => $request->destination,
            'distance' => $request->distance,
            'ride_type' => $request->ride_type,
            'price' => $totalPrice, 
            'status' => 'Accepted',
            'driver_name' => $pick['name'],
            'plate_number' => $pick['plate']
        ];

        $order = RideOrder::create($data);
        if ($order) {
            $wallet->balance = $wallet->balance - $totalPrice;
            $wallet->save();

            History::create([
                'user_id' => $userId,
                'transaction_type' => 'Ride Order',
                'description' => 'Pesanan ' . $request->ride_type . ' dari ' . $request->pickup_location . ' ke ' . $request->destination,
                'amount' => $totalPrice,
                'status' => 'Accepted'
            ]);

            return redirect()->route('order.tracking', $order->id)->with([
                'success' => 'Order berhasil dibuat!'
            ]);
        }

        return back()->with('error', 'Failed to create order');
    }

    public function orderTracking($id)
    {
        $order = RideOrder::findOrFail($id);
        return view('order.ordering', compact('order'));
    }

    public function orderCancel($id)
    {
        $order = RideOrder::findOrFail($id);

        if ($order->status == 'Accepted') {
            $userId = Auth::id();
            $wallet = Wallet::where('user_id', $userId)->first();
            if ($wallet) {
                $wallet->balance = $wallet->balance + $order->price;
                $wallet->save();

                History::create([
                    'user_id' => $userId,
                    'transaction_type' => 'Ride Order Refund',
                    'description' => 'Refund pembatalan pesanan ride dari ' . $order->pickup_location . ' ke ' . $order->destination,
                    'amount' => $order->price,
                    'status' => 'Refund'
                ]);
            }

            $order->update(['status' => 'Canceled']);

            return redirect('/ride')->with('success', 'Pesanan berhasil dibatalkan! Saldo anda telah dikembalikan.');
        }

        return back()->with('error', 'Pesanan tidak dapat dibatalkan.');
    }

    public function orderComplete($id)
    {
        $order = RideOrder::findOrFail($id);

        if ($order->status == 'Accepted') {
            $order->update(['status' => 'Completed']);

            return redirect('/ride')->with('success', 'Perjalanan selesai! Terima kasih telah menggunakan RideNow.');
        }

        return back()->with('error', 'Gagal menyelesaikan pesanan.');
    }
    
}