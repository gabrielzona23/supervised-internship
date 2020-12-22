<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{

    protected $fillable = ['number', 'name', 'description', 'type'];
    
    public function person(){
        return $this->belongsTo(Person::class);
    }

    use HasFactory;
}
