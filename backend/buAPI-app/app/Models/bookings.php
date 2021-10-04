<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    use HasFactory;
    
    //Relación n-1 con room y con user
    public function user()
    {
        return this->belongsTo(users::class);
    }

    public function room()
    {
        return this->belongsTo(rooms::class);
    }
}
