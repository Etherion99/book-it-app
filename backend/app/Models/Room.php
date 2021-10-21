<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_number',
        'roomtype_id',
        'branch_id',        
    ];

    //Relación 1-n con bookings
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    //relación n-1 con branches-roomtype
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function roomtype()
    {
        return $this->belongsTo(RoomType::class);
    }
}
