<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dFood extends Model
{
    protected $table = 'd_food';
    protected $fillable = [
        'restaurant_id',
        'category_id',
        'name',
        'price',
        'image'
    ];
    public function restaurant()
    {
        return $this->belongsTo(dRestaurant::class,'restaurand_id');
    }
    public function category()
    {
        return $this->belongsTo(dCategory::class,'category_id');
    }
}
