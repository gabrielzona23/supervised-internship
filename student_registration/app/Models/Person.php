<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'persons';

    protected $fillable = ['name', 'image', 'born_state','cpf','rg','emitter_rg', 'gender'];

    public function addresses(){
        return $this->belongsToMany(Address::class);
    }

    public function jobs(){
        return $this->belongsToMany(Job::class,'job_person','person_id', 'job_id')->withPivot('workplace_name', 'length_of_service', 'hours_worked_daily');
    }

    public function phones(){
        return $this->hasMany(Phone::class);
    }

    public function relative(){
        return $this->hasOne(Relative::class);
    }

    public function student(){
        return $this->hasOne(Student::class);
    }

    public function responsibly(){
        return $this->hasOne(Responsibly::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function lastUpdatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }
}
