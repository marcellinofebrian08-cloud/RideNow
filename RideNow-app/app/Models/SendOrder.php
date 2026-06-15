<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SendOrder extends Model
{
    protected $table = 'send_orders';

    protected $fillable = [
        'sender_name',
        'receiver_name',
        'pickup_location',
        'destination',
        'distance',
        'item_name',
        'price',
        'status',
        'driver_name',
        'plate_number'
    ];
}