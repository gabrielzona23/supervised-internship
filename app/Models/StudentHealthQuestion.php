<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHealthQuestion extends Model
{
    protected $table = 'student_health_questions';

    public function registrations()
    {
        return $this->belongsToMany(Registration::class, 'registration_student_health', 'student_health_id');
    }
    use HasFactory;
}
