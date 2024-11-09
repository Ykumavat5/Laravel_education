<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyMaterial extends Model
{
    use HasFactory;
    protected $table='study_materials';

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function divisionStandard()
    {
        return $this->belongsTo(DivisionStandard::class, 'standard_division_id');
    }

}
