<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    public function students(){
        return $this->belongsToMany(Student::class);
    }

    public function person(){
        return $this->belongsTo(Person::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function lastUpdatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }

    public function deletedBy(){
        return $this->belongsTo(User::class,'deleted_by');
    }
    use HasFactory;
}
