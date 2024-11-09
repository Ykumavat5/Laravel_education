<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = ['user_id', 'enrollment_date','date_of_birth','gender','address','emergency_contact_name','emergency_contact_phone'];

    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    // If you have an assignments relationship
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function studyMaterials()
    {
        return $this->hasMany(StudyMaterial::class, 'teacher_id');
    }

}
