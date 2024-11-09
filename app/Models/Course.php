<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'course_categories');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
