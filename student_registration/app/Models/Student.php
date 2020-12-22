<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

    protected $fillable = [
        'born_date',
        'nationality',
        'ethnicity',
        'breed',
        'color',
        'number_card_sus',
        'inep_code',
        'status',
        'nis',
        'person_id',
        'created_by'
    ];

    const VALIDATORS_STORE = [
        'special_needs' => ['bail','required_if:special_needs_check,1', 'string', 'max:64'],
        'name' => ['bail','required', 'string', 'max:64'],
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
        'image_authorization' => ['bail','required', 'boolean'],
        'special_needs_check' => ['bail','required', 'boolean'],
        'gender' => ['bail', 'max:64'],
        'born_date' => ['bail','required', 'date', 'min:10' ,'max:10'],
        'cpf' => ['bail','required', 'min:14', 'max:14'],
        'rg' => ['bail','required', 'min:5', 'max:20'],
        'emitter_rg' => ['bail', 'max:16'],
        'phone1' => ['bail','required', 'min:7', 'max:15'],
        'phone2' => ['bail', 'max:15'],
    ];

    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function specialNeeds()
    {
        return $this->belongsToMany(SpecialNeed::class, 'special_need_student');
    }

    public function relatives()
    {
        return $this->belongsToMany(Relative::class, 'relative_student');
    }

    public function transports()
    {
        return $this->belongsToMany(Transport::class, 'student_transport');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    use HasFactory;
}
