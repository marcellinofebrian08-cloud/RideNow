<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transit extends Model
{
    protected $table = 'transits';

    protected $fillable = [
        'name',
        'image',
        'origin',
        'destination',
        'price'
    ];
}