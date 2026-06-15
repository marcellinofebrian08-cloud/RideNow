<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['resto_name', 'category', 'location', 'rating'];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
