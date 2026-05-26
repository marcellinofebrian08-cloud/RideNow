<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RideOrder;
use App\Models\Wallet;

class RideOrderController extends Controller
{
    public function orderCreate()
    { 
        $userId = 1;

        $wallet = Wallet::firstOrCreate(
            ['user_id' => $userId],
            ['balance' => 0]
        );

        return view('order.create', compact('wallet')); 
    }

    public function orderStore(Request $request)
    {
    $distance = $request->distance; 
    
    //Tarif per KM: Bike = 3000/KM, Car = 6000/KM
    $pricePerKm = $request->ride_type == 'Bike' ? 3000 : 6000;
    
    $totalPrice = $distance * $pricePerKm;

    $userId = 1;

    $wallet = Wallet::firstOrCreate(
        ['user_id' => $userId],
        ['balance' => 0]
    );

    if ($wallet->balance < $totalPrice) {
        return redirect('/ride')->with('error', 'Saldo tidak cukup, silakan top up terlebih dahulu!');
    }

    $data = [
        'passenger_name' => $request->passenger_name,
        'pickup_location' => $request->pickup_location,
        'destination' => $request->destination,
        'ride_type' => $request->ride_type,
        'price' => $totalPrice, //Menyimpan harga tarif pesanan
        'status' => 'Pending'
    ];

    if (RideOrder::create($data)) {

        $wallet->balance = $wallet->balance - $totalPrice;
        $wallet->save();

        return redirect('/ride')->with([
            'success' => 'Order Berhasil Dibuat! Saldo wallet berhasil dipotong.',
            'pickup' => $request->pickup_location,
            'destination' => $request->destination,
            'distance' => $distance,
            'price' => $totalPrice
        ]);
    }

    return back()->with('error', 'Failed to create order');
    }
}