<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departments extends Model
{
    

    //relación n-1 con country
    public function country()
    {
        return this->belongsTo(countries::class);
    }

    //relación 1-n con city
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
