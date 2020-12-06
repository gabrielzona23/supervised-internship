<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
    use HasFactory;
}
