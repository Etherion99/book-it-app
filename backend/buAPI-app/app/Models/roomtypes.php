<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roomtypes extends Model
{
    
    
    //relación 1-n con rooms
    public function rooms()
    {
        return $this->hasMany(rooms::class);
    }
}
