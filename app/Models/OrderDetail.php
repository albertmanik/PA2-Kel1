<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public function checkout()
    {
        return $this->belongsTo(Checkout::class, 'order_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class);
    }
}
