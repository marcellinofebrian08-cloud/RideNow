<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dBooking extends Model
{
    protected $table = 'd_bookings';
    protected $fillable = [
        'restaurant_id',
        'customer_name',
        'phone',
        'booking_date',
        'total_people'
    ];
    public function restaurant()
    {
        return $this->belongsTo(dRestaurant::class,'restaurant_id');
    }
}
