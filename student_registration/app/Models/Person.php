<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'name', 'image', 'born_state', 'born_city', 'cpf', 'rg', 'emitter_rg', 'gender', 'created_by', 'phone1', 'phone2'
    ];

    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'address_person', 'person_id');
    }

    public function job()
    {
        return $this->hasOne(Job::class, 'person_id');
    }

    public function relative()
    {
        return $this->hasOne(Relative::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function responsibly()
    {
        return $this->hasOne(Responsibly::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
