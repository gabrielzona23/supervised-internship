<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyGroup extends Model
{
    public function registration(){
        return $this->belongsTo(Registration::class, 'registration_id');
    }
    use HasFactory;
}
