<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'sizes';


    public function products()
    {
        return $this->belongsToMany(Products::class, 'size_products', 'size_id', 'product_id')
        ->withPivot('stock');
    }
}
