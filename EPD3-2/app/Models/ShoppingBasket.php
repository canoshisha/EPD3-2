<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingBasket extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'shopping_baskets';

    public function users(){
        return $this->belongsTo(User::class,"users_id");
    }
    public function products(){
        return $this->hasMany(Products::class,"products_id");
    }
}
