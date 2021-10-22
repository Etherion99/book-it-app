<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'branchtype_id',
        'name',
        'address',
        'phone',
        'description',
        'city_id'
    ];
 
    // Relación n-1 con : branchtype-city-hotel
    public function branchtype()
    {
        return $this->belongsTo(BracnhType::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    // Relación 1-n con room
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
