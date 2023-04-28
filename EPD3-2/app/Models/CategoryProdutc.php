<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProdutc extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'category_product';


    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
