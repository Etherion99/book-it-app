<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{    
    

    //Relación n-1 con departament
    public function department()
    {
        return $this->belongsTo(Department::class);
    }


    //Relación 1-n con branches - users
     public function users()
     {
         return $this->hasMany(User::class);
     }

     public function branches()
     {
         return $this->hasMany(Branch::class);
     }

}
