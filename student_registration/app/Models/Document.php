<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function registrations(){
        return $this->belongsToMany(Registration::class);
    }
    use HasFactory;
}
