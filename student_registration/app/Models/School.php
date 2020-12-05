<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function addresses(){
        return $this->hasOne(Address::class);
    }
    use HasFactory;
}
