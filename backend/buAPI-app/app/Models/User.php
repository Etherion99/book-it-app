<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
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
        return this->belongsTo(City::class);
    }
    public function documenttype()
    {
        return this->belongsTo(documenttypes::class);
    }
    public function gender()
    {
        return this->belongsTo(gender::class);
    }


    //relación 1-1 con hotel
    public function hotel()
    {
        return $this->hasOne(hotels::class);
    }
}
