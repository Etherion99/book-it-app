<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    

    protected $fillable = [
        'date->enabled',
        'hour->enabled',
        'time->enabled',
        'user_id->enabled',
        'room_id->enabled',
    ];
    
    //Relación n-1 con room y con user
    public function user()
    {
        return $this->belongsTo(users::class);
    }

    public function room()
    {
        return $this->belongsTo(rooms::class);
    }
}
