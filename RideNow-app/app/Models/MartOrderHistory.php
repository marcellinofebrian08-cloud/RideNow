<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MartOrderHistory extends Model
{
    protected $fillable = [
        'category_name',
        'total_price'
    ];
}