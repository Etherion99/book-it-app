<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'web_page',
        'nit',        
    ];

    //relación 1-n con branches
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    //relación 1-1 con users
    public function user()
    {
        return $this->hasOne(User::class);
    }

}
