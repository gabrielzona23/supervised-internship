<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthProblems extends Model
{
    public function students(){
        return $this->belongsToMany(StudentHealth::class, 'health_problems_student', 'health_problem_id');
    }

    use HasFactory;
}
