<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name->enabled',
        'lastname->enabled',
        'email->enabled',        
        'username->enabled',  
        'password->enabled',  
        'city_id->enabled',
        'document->enabled',    
        'gender->enabled',  
        'hotel_id->enabled',          
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
