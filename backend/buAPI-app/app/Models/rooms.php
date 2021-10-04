<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    use HasFactory;

    //Relación 1-n con bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    //relación n-1 con branches-roomtype
}
