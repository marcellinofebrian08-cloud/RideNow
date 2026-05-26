<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RideOrder extends Model
{
    protected $fillable = [
        'passenger_name',
        'pickup_location',
        'destination',
        'ride_type',
        'price',
        'status'
    ];
}
