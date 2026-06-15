<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MartCategory extends Model
{
    protected $fillable = [
        'category_name'
    ];

    public function products()
    {
        return $this->hasMany(MartProduct::class,'category_id');
    }
}