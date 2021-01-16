<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextualAnswer extends Model
{
    protected $table = 'textual_answers';
    // public function question()
    // {
    //     return $this->belongsTo(Question::class);
    // }

    // public function student()
    // {
    //     return $this->belongsTo(Student::class);
    // }
    use HasFactory;
}
