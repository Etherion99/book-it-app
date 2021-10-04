<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    //Relación 1-n con bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    //Relación n-1 con city-documenttype-gender


    //relación 1-1 con hotel
}
