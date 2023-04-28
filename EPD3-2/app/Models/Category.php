<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'categories';

    public function products()
    {
        return $this->belongsToMany(Products::class, 'category_product', 'category_id', 'product_id');
    }
}
