<?php

namespace App\Http\Controllers;

use App\Models\Transit;
use App\Models\TransitBooking;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\History;

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
        $wallet = Wallet::where('user_id', auth()->id())->first();
        return view('transit.booking', compact(
            'transit',
            'wallet'
        ));
    }

    public function bookingStore(Request $request)
    {
        $transit = Transit::findOrFail($request->transit_id);
        $wallet = Wallet::where('user_id', auth()->id())->first();
        $total = $transit->price * $request->total_passenger;
        if ($wallet->balance < $total) {
            return redirect()->back()
                ->with('error', 'Saldo tidak cukup');
        }

        TransitBooking::create([
            'transit_id' => $request->transit_id,
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'booking_date' => $request->booking_date,
            'total_passenger' => $request->total_passenger,
        ]);
        $wallet->balance -= $total;
        $wallet->save();
        $transit = Transit::find($request->transit_id);
        History::create([
            'transaction_type' => 'Transit',
            'description' => $transit->name,
            'amount' => $transit->price * $request->total_passenger,
            'status' => 'Berhasil'
        ]);

        return redirect('/history')
            ->with('success', 'Booking Transit Berhasil');
    }
}
