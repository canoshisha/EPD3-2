<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'credit_cards';

    public function user(){
        return $this->belongsTo(User::class,"users_id");
    }
    public function orders(){
        return $this->belongsTo(Order::class,"id");
    }
}