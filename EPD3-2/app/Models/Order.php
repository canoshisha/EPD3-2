<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'orders';
    protected $fillable = [
        'pagement',
        'date',
        'state',
        'users_id',
        'products_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,"users_id");
    }

    public function products(){
        return $this->hasMany(Products::class,"products_id");
    }
    public function ticket(){
        return $this->hasOne(Ticket::class,"tickets_id");
    }
}
