<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{

    public function registrations(){
        return $this->belongsToMany(Registration::class)->withPivot('expiration');
    }
    use HasFactory;
}
