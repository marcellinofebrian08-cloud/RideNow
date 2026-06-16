<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transit;
use App\Models\TransitBooking;

class TransitController extends Controller
{
    public function index()
    {
        $transits = Transit::all();
        return view('transit.home', compact('transits'));
    }
    public function bookingForm($id)
    {
        $transit = Transit::findOrFail($id);
        return view('transit.booking', compact('transit'));
    }
    public function bookingStore(Request $request)
    {
        TransitBooking::create([
            'transit_id' => $request->transit_id,
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'booking_date' => $request->booking_date,
            'total_passenger' => $request->total_passenger,
        ]);
        return redirect('/transit')
            ->with('success', 'Booking berhasil');
    }
}
