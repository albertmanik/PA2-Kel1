<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }

    public function reviews()
    {
        return $this->hasManyThrough(Review::class, User::class);
    }
}
