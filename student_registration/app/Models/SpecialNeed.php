<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialNeed extends Model
{
    public function students(){
        return $this->belongsToMany(Student::class,'special_need_student');
    }
    use HasFactory;
}
