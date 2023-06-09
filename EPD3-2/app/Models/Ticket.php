<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $timestamps = false;
    protected $table = 'tickets';
    use HasFactory;
    protected $fillable = [
        'price_total',
        'date',
        'orders_id',
    ];

    public function orders(){
        return $this->belongsTo(Order::class,"orders_id");
    }
}
