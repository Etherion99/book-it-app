<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documenttype extends Model
{
    

    //Relación 1-n con users
    public function users()
    {
        return $this->hasMany(users::class);
    } 
}
