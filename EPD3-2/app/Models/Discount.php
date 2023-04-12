<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'discounts';

    public function products(){
        return $this->belongsToMany(Products::class,"products_id");
    }
}
