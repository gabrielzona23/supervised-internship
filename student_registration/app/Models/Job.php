<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function persons(){
        return $this->belongsToMany(Person::class,'job_person','job_id','person_id')->withPivot('workplace_name','length_of_service','hours_worked_daily');
    }
    use HasFactory;
}
