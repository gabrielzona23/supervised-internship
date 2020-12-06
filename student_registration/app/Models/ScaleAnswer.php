<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScaleAnswer extends Model
{
    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function registration(){
        return $this->belongsTo(Registration::class);
    }
    use HasFactory;
}
