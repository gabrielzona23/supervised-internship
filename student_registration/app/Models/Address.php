<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'city',
        'number',
        'street',
        'branch_line',
        'residential_area',
        'state',
        'country',
        'neighborhood',
        'cep',
        'complement',
        'electrical_installation_code',
        'reference'
    ];

    const VALIDATORS_STORE = [];

    public function schools()
    {
        return $this->hasOne(School::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'address_student', 'address_id');
    }
}
