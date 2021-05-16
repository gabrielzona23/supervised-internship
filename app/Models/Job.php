<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'init', 'end', 'workplace_name', 'hours_worked_daily'];
    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
