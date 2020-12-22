<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    public function module(){
        return $this->belongsTo(ModuleQuestion::class);
    }

    public function booleanAnswers(){
        return $this->belongsToMany(BooleanAnswer::class);
    }

    public function textualAnswers(){
        return $this->belongsToMany(TextualAnswer::class);
    }

    public function scalesAnswers(){
        return $this->belongsToMany(ScaleAnswer::class);
    }

    use HasFactory, SoftDeletes;
}
