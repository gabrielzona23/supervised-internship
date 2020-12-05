<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendedSchool extends Model
{

    public function students(){
        return $this->belongsToMany(Student::class)->using(AttendedSchoolStudent::class);
    }


    use HasFactory;
}
