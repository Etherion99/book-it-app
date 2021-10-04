<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branchtypes extends Model
{
    use HasFactory;

    // Relación 1-n con branches
    public function branches()
    {
        return $this->hasMany(branches::class);
    }
}
