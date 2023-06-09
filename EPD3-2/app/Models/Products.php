<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';

    public function orders()
    {
    return $this->belongsToMany(Order::class, 'order_product')
                ->withPivot('quantity','size');
    }

    public function imgProducts(){
        return $this->hasMany(ImgProducts::class,'img_products_id');
    }
    public function discount(){
        return $this->hasOne(Discount::class,'discounts_id');
    }
    public function favorites(){
        return $this->hasOne(Favorites::class,'products_id');
    }
    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'size_products', 'product_id', 'size_id')
        ->withPivot('stock');
    }

    public function stock_p()
{
    return SizeProduct::where('product_id', $this->id)->sum('stock');
}
public function stock_act($size_id)
{
    return SizeProduct::where('product_id', $this->id)->where('size_id', $size_id)->sum('stock');
}

public function sizeProduct($size_id){
    return SizeProduct::where('product_id', $this->id)->where('size_id', $size_id)->first();
}

public function finalPrice(){
    $finalPrice = $this->price - ($this->price * ($this->discount / 100));
    return number_format($finalPrice, 2);
}


}