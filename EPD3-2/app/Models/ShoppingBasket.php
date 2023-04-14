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
        'productsB_id',
        'users_id',
    ];

    protected $primaryKey = 'id';

    public function users(){
        return $this->belongsTo(User::class,"users_id");
    }
    public function productBasket(){
        return $this->hasMany(ProductBasket::class,"productsB_id");
    }
    public function calcularTotal(){
        $products = $this->productBasket;
        $total=0;
        foreach ($products as $productB){
            $total = $total + $productB->product->price * $productB->cantidad;
        }

        return $total;
    }

}
