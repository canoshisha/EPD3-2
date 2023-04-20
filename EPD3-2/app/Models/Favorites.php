<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'favorites';
    protected $fillable = [
        'products_id',
        'users_id',
    ];

    public function products(){
        return $this->belongsToMany(Products::class,"products_id");
    }
    public function user(){
        return $this->belongsTo(User::class,"users_id");
    }
}
