<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPerson extends Model
{
    protected $table = 'job_person';
    public function hours(){
        return $this->hasMany(OfficeHour::class,'job_person_id');
    }
    use HasFactory;
}
