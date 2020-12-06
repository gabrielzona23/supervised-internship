<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function programs(){
        return $this->belongsToMany(Program::class);
    }

    public function registrations(){
        return $this->hasMany(Registration::class);
    }

    public function specialNeeds(){
        return $this->belongsToMany(SpecialNeed::class,'special_need_student');
    }

    public function relatives(){
        return $this->belongsToMany(Relative::class,'relative_student');
    }

    public function transports(){
        return $this->belongsToMany(Transport::class,'student_transport');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function person(){
        return $this->belongsTo(Person::class);
    }

    use HasFactory;
}