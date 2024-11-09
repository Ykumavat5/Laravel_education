<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventEnrollment extends Model
{
    use HasFactory;
    protected $table = 'extracurricular_enrollments';

    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }

    public function activity()
    {
        return $this->belongsTo(Event::class,'actrivity_id');
    }
}
