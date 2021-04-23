<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttendedSchool extends Model
{

    protected $fillable = [
        'name',
        'year',
        'school_grade',
        'network',
        'type',
        'city',
        'administrative_department',
    ];

    const VALIDATORS_STORE = [
        'name' => ['bail', 'required', 'min:4', 'max:64'],
        'year' => ['bail', 'nullable', 'min:4', 'max:4'],
        'school_grade' => ['bail', 'required', 'min:2', 'max:64'],
        'network' => ['bail', 'in:Particular,Público,Particular com bolsa'],
        'type' => ['bail', 'in:Creche,Pré-escola,Ensino médio'],
        'city' => ['bail', 'nullable', 'min:2', 'max:64'],
        'administrative_department' => ['bail', 'nullable', 'min:2', 'max:32'],
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'attended_school_student', 'schools_id');
    }

    use HasFactory; //,SoftDeletes;
}
