<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{

    public function students(){
        return $this->belongsToMany(Student::class);
    }
    use HasFactory;
}
