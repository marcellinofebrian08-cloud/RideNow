<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    protected $fillable = ['resto_name', 'category', 'location', 'rating'];

    // Relasi: Satu restoran punya banyak menu
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
