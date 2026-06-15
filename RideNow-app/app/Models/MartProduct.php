<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MartProduct extends Model
{
    protected $fillable = [
        'category_id',
        'product_name',
        'price',
        'picture',
        'stock'
    ];

    public function category()
    {
        return $this->belongsTo(MartCategory::class);
    }
}