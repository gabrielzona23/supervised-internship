<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    public function schools(){
        return $this->hasOne(School::class);
    }

    public function persons(){
        return $this->belongsToMany(Person::class);
    }

    use SoftDeletes;
    use HasFactory;
}