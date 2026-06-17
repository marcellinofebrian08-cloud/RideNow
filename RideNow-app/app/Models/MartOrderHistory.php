<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MartOrderHistory extends Model
{
    protected $fillable = [
        'items',
        'total_price'
    ];
}