<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;


    const VALIDATORS_STORE = [
        '1' => ['bail', 'max:1024'],
        // '2' => ['bail', 'boolean'],
        // '3' => ['bail', 'boolean'],
        '4' => ['bail', 'max:1024'],
        // '5' => ['bail', 'boolean'],
        '6' => ['bail', 'max:1024'],
        // '7' => ['bail', 'boolean'],
        '8' => ['bail', 'max:1024'],
        // '9' => ['bail', 'boolean'],
        '10' => ['bail', 'max:1024'],
        // '11' => ['bail', 'boolean'],
        '12' => ['bail', 'max:1024'],
        // '13' => ['bail', 'boolean'],
        '14' => ['bail', 'max:1024'],
        '15' => ['bail', 'max:1024'],
        '16' => ['bail', 'max:1024'],
        // '17' => ['bail', 'boolean'],
        '18' => ['bail', 'max:1024'],
        // '19' => ['bail', 'boolean'],
        '20' => ['bail', 'max:1024'],
        // '21' => ['bail', 'in:1,2,3'],
        '22' => ['bail', 'max:1024'],
        '23' => ['bail', 'max:1024'],
        '24' => ['bail', 'max:1024'],
        '25' => ['bail', 'max:1024'],
        '26' => ['bail', 'max:1024'],
        '27' => ['bail', 'max:1024'],
        '28' => ['bail', 'max:1024'],
        '29' => ['bail', 'max:1024'],
        '30' => ['bail', 'max:1024'],
        '31' => ['bail', 'max:1024'],
        '32' => ['bail', 'max:1024'],
        '33' => ['bail', 'max:1024'],
        '34' => ['bail', 'max:1024'],
        // '35' => ['bail', 'in:1,2,3'],
        // '36' => ['bail', 'boolean'],
        '37' => ['bail', 'max:1024'],
        '38' => ['bail', 'max:1024'],
        '39' => ['bail', 'max:1024'],
        '41' => ['bail', 'max:1024'],
    ];
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
