<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'orders';


    public function user(){
        return $this->belongsTo(User::class,"users_id");
    }

    public function products()
    {
        return $this->belongsToMany(Products::class, 'order_product', 'order_id', 'product_id')
                    ->withPivot('quantity', 'size');
    }
    
    public function ticket(){
        return $this->hasOne(Ticket::class,"tickets_id");
    }
}
