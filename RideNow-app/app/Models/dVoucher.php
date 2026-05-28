<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dVoucher extends Model
{
    protected $table = 'd_vouchers';
    protected $fillable = [
        'title',
        'discount'
    ];
}
