<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'lastname',
        'email',        
        'username',  
        'password',  
        'city_id',
        'document',    
        'gender',  
        'hotel_id',          
    ];

    //Relación 1-n con bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    //Relación n-1 con city-documenttype-gender
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function documenttype()
    {
        return $this->belongsTo(documenttypes::class);
    }
    public function gender()
    {
        return $this->belongsTo(gender::class);
    }


    //relación 1-1 con hotel
    public function hotel()
    {
        return $this->hasOne(hotels::class);
    }
}
