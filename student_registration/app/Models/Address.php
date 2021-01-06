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

    const VALIDATORS_STORE = [
        'special_needs' => ['bail', 'required_if:special_needs_check,1', 'string', 'max:64'],
        'name' => ['bail', 'required', 'string', 'max:64'],
        'programs' => ['bail', 'max:64'],
        'nationality' => ['bail', 'max:32'],
        'born_city' => ['bail', 'max:32'],
        'born_state' => ['bail', 'max:32'],
        'job' => ['bail', 'max:32'],
        'number_car_sus' => ['bail', 'max:32'],
        'inep_code' => ['bail', 'max:32'],
        'nis' => ['bail', 'max:32'],
        'color' => ['bail', 'max:32'],
        'breed' => ['bail', 'max:32'],
        'image_authorization' => ['bail', 'required', 'boolean'],
        'special_needs_check' => ['bail', 'required', 'boolean'],
        'gender' => ['bail', 'max:64'],
        'born_date' => ['bail', 'required', 'date', 'min:10', 'max:10'],
        'cpf' => ['bail', 'required', 'min:14', 'max:14'],
        'rg' => ['bail', 'required', 'min:5', 'max:20'],
        'emitter_rg' => ['bail', 'max:16'],
        'phone1' => ['bail', 'required', 'min:7', 'max:15'],
        'phone2' => ['bail', 'max:15'],
    ];

    public function schools()
    {
        return $this->hasOne(School::class);
    }

    public function persons()
    {
        return $this->belongsToMany(Person::class, 'address_person', 'address_id');
    }
}
