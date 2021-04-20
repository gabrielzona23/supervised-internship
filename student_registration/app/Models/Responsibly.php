<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsibly extends Model
{
    protected $fillable = ['kinship', 'family_bag'];

    const VALIDATORS_STORE = [

        'name1' => ['bail', 'required', 'string', 'max:64'],
        'cpf1' => ['bail', 'required', 'min:14', 'max:14'],
        'rg1' => ['bail', 'required', 'min:5', 'max:20'],
        'emitter_rg1' => ['bail', 'required', 'max:16'],
        'nis1' => ['bail', 'max:32'],

        'family_bag' => ['bail', 'required'],
        'kinship' => ['bail', 'max:64'],

        'phone3' => ['bail', 'required', 'string', 'min:14', 'max:15'],
        'phone4' => ['bail', 'nullable', 'string', 'min:14', 'max:15'],
        'parents_divorced' => ['bail', 'filled', 'boolean'],
        'student_custody' => ['bail', 'required_if:parents_divorced,1', 'nullable', 'string', 'min:14', 'max:32'],

    ], VALIDATORS_UPDATE = [

        'name1' => ['bail', 'required', 'string', 'max:64'],
        'cpf1' => ['bail', 'required', 'min:14', 'max:14'],
        'rg1' => ['bail', 'required', 'min:5', 'max:20'],
        'emitter_rg1' => ['bail', 'required', 'max:16'],
        'nis1' => ['bail', 'max:32'],

        'family_bag' => ['bail', 'required'],
        'kinship' => ['bail', 'max:64'],

        'phone3' => ['bail', 'required', 'string', 'min:14', 'max:15'],
        'phone4' => ['bail', 'nullable', 'string', 'min:14', 'max:15'],
        'parents_divorced' => ['bail', 'filled', 'boolean'],
        'student_custody' => ['bail', 'nullable', 'required_if:parents_divorced,1', 'string', 'min:14', 'max:32'],

    ];

    public function registrations()
    {
        return $this->belongsToMany(Registration::class, 'registration_responsibly');
    }

    public function createBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }


    use HasFactory;
}
