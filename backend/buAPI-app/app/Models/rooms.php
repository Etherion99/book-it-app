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
        return $this->hasMany(bookings::class);
    }

    //relación n-1 con branches-roomtype
    public function branch()
    {
        return this->belongsTo(branches::class);
    }
    public function roomtype()
    {
        return this->belongsTo(roomtypes::class);
    }
}
