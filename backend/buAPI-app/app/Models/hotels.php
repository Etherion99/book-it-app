<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotels extends Model
{
    protected $fillable = [
        'name->enabled',
        'web_page->enabled',
        'nit->enabled',        
    ];

    //relación 1-n con branches
    public function branches()
    {
        return $this->hasMany(branches::class);
    }

    //relación 1-1 con users
    public function user()
    {
        return $this->hasOne(users::class);
    }

}
