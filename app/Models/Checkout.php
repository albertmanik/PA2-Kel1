<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function product()
    // {
    //     return $this->hasMany(Product::class, 'order_id');
    // }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
