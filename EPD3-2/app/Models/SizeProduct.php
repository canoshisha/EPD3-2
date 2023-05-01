<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'size_product';

    public function sizes()
    {
        return $this->belongsTo(Size::class);
    }

    public function products()
    {
        return $this->belongsTo(Products::class);
    }
}
