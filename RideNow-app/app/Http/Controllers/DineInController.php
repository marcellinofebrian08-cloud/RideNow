<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dBanner;
use App\Models\dCategory;
use App\Models\dRestaurant;
use App\Models\dVoucher;
use App\Models\dBooking;
use Illuminate\Support\Facades\Redirect;

class DineInController extends Controller
{
    public function index()
    {
        $banners = dBanner::all();
        $categories = dCategory::all();
        $restaurants = dRestaurant::all();
        $vouchers = dVoucher::all();
        return view('dinein.home', compact(
            'banners',
            'categories',
            'restaurants',
            'vouchers'
        ));
    }
    public function bookingForm($id)
    {
        $restaurant = dRestaurant::findOrFail($id);
        return view('dinein.booking',compact('restaurant'));
    }
    public function bookingStore(Request $request)
    {
        dBooking::create([
            'restaurant_id' => $request->restaurant_id,
            'customer_name'=> $request->customer_name,
            'phone' => $request->phone,
            'booking_date' => $request->booking_date,
            'total_people' => $request->total_people
        ]);
        return redirect('/dinein')->with('success','Booking berhasil');
    }
}
