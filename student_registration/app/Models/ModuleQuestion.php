<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleQuestion extends Model
{
    public function questions(){
        return $this->hasMany(Question::class);
    }
    use HasFactory;
}
