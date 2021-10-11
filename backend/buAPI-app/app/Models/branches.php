<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branches extends Model
{
    protected $fillable = [
        'branchtype_id->enabled',
        'name->enabled',
        'address->enabled',
        'phone->enabled',
        'description->enabled',
    ];
 
    // Relación n-1 con : branchtype-city-hotel
    public function branchtype()
    {
        return $this->belongsTo(branchtypes::class);
    }
    public function city()
    {
        return $this->belongsTo(cities::class);
    }
    public function hotel()
    {
        return $this->belongsTo(hotels::class);
    }
    // Relación 1-n con room
    public function rooms()
    {
        return $this->hasMany(rooms::class);
    }
}
