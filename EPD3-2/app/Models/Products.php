<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'category',
        'price',
        'stock',
        'description',
    ];

    public function orders()
    {
    return $this->belongsToMany(Order::class, 'order_product');
    }
    
    public function imgProducts(){
        return $this->hasMany(ImgProducts::class,'img_products_id');
    }
    public function discount(){
        return $this->hasOne(Discount::class,'discounts_id');
    }
    public function favorites(){
        return $this->hasOne(Favorites::class,'favorites_id');
    }
    

}
