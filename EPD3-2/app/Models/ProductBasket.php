<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productBasket extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'product_baskets';
    

    public function shoppingBasket()
    {
        return $this->belongsTo(ShoppingBasket::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
