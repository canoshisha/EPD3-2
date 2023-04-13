<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgProducts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'img_products';
    protected $fillable = [
        'routeImg',
        'tipo',
        'products_id',
    ];

    public function products(){
        return $this->belongsTo(Products::class,"products_id");
    }
}
