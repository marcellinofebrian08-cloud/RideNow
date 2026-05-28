<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dRestaurant extends Model
{
    protected $table = 'd_restaurants';
    protected $fillable = [
        'name',
        'image',
        'address',
        'rating'
    ];
}
