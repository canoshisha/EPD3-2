<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class, "users_id");
    }
    public function shoppingBasket()
    {
        return $this->hasOne(ShoppingBasket::class, "users_id");
    }
    public function favorites()
    {
        return $this->hasMany(Favorites::class, "users_id");
    }
    public function creditCard()
    {
        return $this->hasOne(CreditCard::class, "credit_cards_id");
    }
    public function phones()
    {
        return $this->hasMany(Phone::class)->cascadeDelete();
    }
    public function address(){
        return $this->hasMany(Address::class)->cascadeDelete();
    }
}