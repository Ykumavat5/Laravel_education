<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionStandard extends Model
{
    use HasFactory;
    protected $table='division_standard';
    protected $fillable = ['standard_id', 'division_id'];


    public function standard()
    {
        return $this->belongsTo(Standard::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function studyMaterial()
    {
        return $this->belongsTo(StudyMaterial::class);
    }

}
