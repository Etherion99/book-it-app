<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departments extends Model
{
    use HasFactory;

    //relación n-1 con country

    //relación 1-n con city
    public function cities()
    {
        return $this->hasMany(cities::class);
    }
}
