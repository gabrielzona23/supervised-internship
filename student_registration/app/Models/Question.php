<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    public function module()
    {
        return $this->belongsTo(ModuleQuestion::class);
    }

    public function booleanAnswers()
    {
        return $this->belongsToMany(BooleanAnswer::class, 'boolean_answers');
    }

    public function textualAnswers()
    {
        return $this->belongsToMany(TextualAnswer::class, 'textual_answers');
    }

    public function scaleAnswers()
    {
        return $this->belongsToMany(ScaleAnswer::class, 'scale_answers');
    }

    use HasFactory, SoftDeletes;
}
