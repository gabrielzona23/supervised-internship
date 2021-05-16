<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'city',
        'state',
        'neighborhood',
        'country',
        'cep',
        'number',
        'electrical_installation_code',
        'residential_area',
        'type_transport',
        'reference',
        'complement',
        'buses_name',
        'transport_localization',
        'route',
    ];

    const VALIDATORS_STORE = [
        'street' => ['bail', 'required', 'string', 'min:3', 'max:64'],
        'city' => ['bail', 'required', 'min:2', 'max:128'],
        'state' => ['bail', 'required', 'min:2', 'max:64'],
        'neighborhood' => ['bail', 'required', 'min:3', 'max:64'],
        'country' => ['bail', 'required', 'min:3', 'max:64'],
        'cep' => ['bail', 'required', 'min:9', 'max:12'],
        'number' => ['bail', 'required', 'min:1', 'max:32'],
        'electrical_installation_core' => ['bail', 'max:32'],
        'residential_area' => ['bail', 'required', 'in:Rural,Urbana'],
        'type_transport' => ['bail', 'in:Público,Particular,Escolar,Variado'],
        'reference' => ['bail', 'max:255'],
        'complement' => ['bail', 'max:255'],
        'buses_name' => ['bail', 'max:64'],
        'transport_localization' => ['bail', 'max:64'],
        'route' => ['bail', 'max:64'],
    ];

    public function schools()
    {
        return $this->hasOne(School::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'address_student', 'address_id');
    }
}
