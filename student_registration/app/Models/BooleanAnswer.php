<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooleanAnswer extends Model
{
    use HasFactory;

    protected $table = 'boolean_answers';

    // public function question()
    // {
    //     return $this->belongsTo(Question::class);
    // }
    // public function student()
    // {
    //     return $this->belongsTo(Student::class);
    // }
}
