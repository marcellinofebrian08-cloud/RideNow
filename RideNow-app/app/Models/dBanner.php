<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dBanner extends Model
{
    protected $table = 'd_banners';
    protected $fillable = [
        'title',
        'image'
    ];
}
