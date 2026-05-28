<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dCategory extends Model
{
    protected $table = 'd_categories';
    protected $fillable = [
        'name',
        'icon'
    ];
}
