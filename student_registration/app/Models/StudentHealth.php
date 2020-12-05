<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHealth extends Model
{
    public function health_problems(){
        return $this->belongsToMany(StudentHealth::class, 'health_problems_student', 'student_health_id');
    }

    public function registrations(){
        return $this->belongsToMany(Registration::class, 'registration_student_health', 'student_health_id');
    }
    use HasFactory;
}
