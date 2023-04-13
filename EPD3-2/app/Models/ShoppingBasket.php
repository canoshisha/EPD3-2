<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingBasket extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'shopping_baskets';
    protected $fillable = [
        'products_id',
        'users_id',
    ];

    protected $primaryKey = 'id';

    public function users(){
        return $this->belongsTo(User::class,"users_id");
    }
    public function products(){
        return $this->hasMany(Products::class,"products_id");
    }
    public function calcularTotal(){
        $products = $this->products;
        $total=0;
        foreach ($products as $product){
            $total = $total + $product->price;
        }

        return $total;
    }

}
