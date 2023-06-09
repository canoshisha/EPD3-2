<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function user(){
        return $this->belongsTo(User::class,"users_id");
    }
    public function orders(){
        return $this->belongsToMany(Order::class,"orders_id");
    }
}
