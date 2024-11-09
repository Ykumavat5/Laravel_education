<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'extracurricular_activities';

    public function enrollments()
    {
        return $this->hasMany(EventEnrollment::class);
    }

    // Calculate the available spots
    public function availableSpots()
    {
        $enrolledCount = $this->enrollments()->count();
        return $this->max_participants - $enrolledCount;
    }

}
