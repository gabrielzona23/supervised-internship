<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeHour extends Model
{
    public function job(){
        return $this->belongsTo(JobPerson::class,'job_person_id');
    }
    use HasFactory;
}
