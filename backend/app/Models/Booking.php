<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    

    protected $fillable = [
        'date',
        'hour',
        'time',
        'user_id',
        'room_id',
    ];
    
    //Relación n-1 con room y con user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
