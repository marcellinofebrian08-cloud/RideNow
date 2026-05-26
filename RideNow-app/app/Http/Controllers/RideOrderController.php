<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RideOrder;

class RideOrderController extends Controller
{
    public function orderCreate()
    { return view('order.create'); }

    public function orderStore(Request $request)
    {
    $distance = $request->distance; 
    
    //Tarif per KM: Bike = 3000/KM, Car = 6000/KM
    $pricePerKm = $request->ride_type == 'Bike' ? 3000 : 6000;
    
    $totalPrice = $distance * $pricePerKm;

    $data = [
        'passenger_name' => $request->passenger_name,
        'pickup_location' => $request->pickup_location,
        'destination' => $request->destination,
        'ride_type' => $request->ride_type,
        'price' => $totalPrice, //Menyimpan harga tarif pesanan
        'status' => 'Pending'
    ];

    if (RideOrder::create($data)) {
        return redirect('/ride')->with([
            'success' => 'Order Berhasil Dibuat!',
            'pickup' => $request->pickup_location,
            'destination' => $request->destination,
            'distance' => $distance,
            'price' => $totalPrice
        ]);
    }

    return back()->with('error', 'Failed to create order');
    }
}