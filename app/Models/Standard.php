<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;

    public function divisionStandards()
    {
        return $this->hasMany(DivisionStandard::class);
    }
    
}
