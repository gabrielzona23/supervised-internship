<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsibly extends Model
{
    public function registrations(){
        return $this->belongsToMany(Registration::class,'registration_responsibly')->withPivot('current');
    }

    public function createBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function person(){
        return $this->belongsTo(Person::class);
    }


    use HasFactory;
}
