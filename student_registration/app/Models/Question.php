<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    public function module()
    {
        return $this->belongsTo(ModuleQuestion::class);
    }

    public function booleanAnswers()
    {
        return $this->belongsToMany(Student::class, 'boolean_answers')->withPivot('value')->withTimestamps();
    }

    public function textualAnswers()
    {
        return $this->belongsToMany(Student::class, 'textual_answers')->withPivot('value')->withTimestamps();
    }

    public function scaleAnswers()
    {
        return $this->belongsToMany(Student::class, 'scale_answers')->withPivot('value')->withTimestamps();
    }
}
