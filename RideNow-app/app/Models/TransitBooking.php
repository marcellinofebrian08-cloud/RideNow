<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransitBooking extends Model
{
    protected $table = 'transit_bookings';
    protected $fillable = [
        'transit_id',
        'customer_name',
        'phone',
        'booking_date',
        'total_passenger'
    ];

    public function transit()
    {
        return $this->belongsTo(Transit::class);
    }
}
