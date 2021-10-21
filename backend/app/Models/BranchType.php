<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchType extends Model
{
    

    // Relación 1-n con branches
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
