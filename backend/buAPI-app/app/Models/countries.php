<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    

    //Relación 1-n con departments
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
