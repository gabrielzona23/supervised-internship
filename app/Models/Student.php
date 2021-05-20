<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;

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

    const VALIDATORS_UPDATE = [
        'name' => ['bail', 'required', 'string', 'min:3', 'max:64'],
        'born_date' => ['bail', 'required', 'date', 'before_or_equal:yesterday', 'min:10', 'max:10'],
        'cpf' => ['bail', 'nullable', 'string', 'min:14', 'max:14'],
        'born_state' => ['bail', 'required', 'string', 'min:2', 'max:32'],
        'rg' => ['bail', 'nullable', 'string', 'min:5', 'max:20'],
        'emitter_rg' => ['bail', 'required_unless:rg,null', 'nullable', 'string', 'min:2', 'max:16'],
        'nationality' => ['bail', 'required', 'string', 'min:2', 'max:32'],
        'born_city' => ['bail', 'required', 'string', 'min:2', 'max:32'],
        'phone1' => ['bail', 'required', 'min:14', 'max:15'],
        'phone2' => ['bail', 'nullable', 'min:14', 'max:15'],
        'number_car_sus' => ['bail', 'nullable', 'string', 'min:2', 'max:32'],
        'inep_code' => ['bail', 'nullable', 'string', 'min:2', 'max:32'],
        'job' => ['bail', 'nullable', 'string', 'min:3', 'max:32'],
        'nis' => ['bail', 'max:32'],
        'programs' => ['bail', 'required', 'max:64'],
        'has_special_needs' => ['bail', 'required', 'boolean'],
        'special_educational_needs' => ['bail', 'required_if:has_special_needs,1', 'max:64'],
        'color' => ['bail', 'nullable', 'string', 'min:2', 'max:32'],
        'breed' => ['bail', 'nullable', 'string', 'min:2', 'max:32'],
        'gender' => ['bail', 'nullable', 'string', 'max:64'],
        'g_mus' => ['bail', 'nullable', 'string', 'min:2', 'max:64'],
    ];

    const VALIDATORS_UPDATE_REGISTRATION = [
        'name' => ['bail', 'required', 'string', 'min:3', 'max:64'],
        'born_date' => ['bail', 'required', 'date', 'before_or_equal:yesterday', 'min:10', 'max:10'],
        'cpf' => ['bail', 'nullable', 'string', 'min:14', 'max:14'],
        'born_state' => ['bail', 'required', 'string', 'min:2', 'max:32'],
        'rg' => ['bail', 'nullable', 'string', 'min:5', 'max:20'],
        'emitter_rg' => ['bail', 'required_unless:rg,null', 'nullable', 'string', 'min:2', 'max:16'],
        'nationality' => ['bail', 'required', 'string', 'min:2', 'max:32'],
        'born_city' => ['bail', 'required', 'string', 'min:2', 'max:32'],
        'phone1' => ['bail', 'required', 'min:14', 'max:15'],
        'phone2' => ['bail', 'nullable', 'min:14', 'max:15'],
        'number_car_sus' => ['bail', 'nullable', 'string', 'min:2', 'max:32'],
        'inep_code' => ['bail', 'nullable', 'string', 'min:2', 'max:32'],
        'job' => ['bail', 'nullable', 'string', 'min:3', 'max:32'],
        'nis' => ['bail', 'max:32'],
        'programs' => ['bail', 'required', 'max:64'],
        'has_special_needs' => ['bail', 'required', 'boolean'],
        'special_educational_needs' => ['bail', 'required_if:has_special_needs,1', 'max:64'],
        'color' => ['bail', 'nullable', 'string', 'min:2', 'max:32'],
        'breed' => ['bail', 'nullable', 'string', 'min:2', 'max:32'],
        'gender' => ['bail', 'nullable', 'string', 'max:64'],
        'image_authorization' => ['bail', 'boolean'],
        'g_mus' => ['bail', 'nullable', 'string', 'min:2', 'max:64'],
        'school_year' => ['bail', 'required', 'string', 'min:4', 'max:4', 'date_format:Y', 'before_or_equal:tomorrow'],
    ];

    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'address_student', 'student_id');
    }
    public function programs()
    {
        return $this->belongsToMany(Program::class);
    }
    public function attendedSchools()
    {
        return $this->belongsToMany(AttendedSchool::class, 'attended_school_student', 'student_id', 'schools_id')->withTimestamps();
    }
    public function registrations()
    {
        return $this->hasMany(Registration::class);
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
    public function booleanAnswers()
    {
        return $this->belongsToMany(Question::class, 'boolean_answers')->withPivot('value')->withTimestamps();
    }
    public function textualAnswers()
    {
        return $this->belongsToMany(Question::class, 'textual_answers')->withPivot('value')->withTimestamps();
    }
    public function scaleAnswers()
    {
        return $this->belongsToMany(Question::class, 'scale_answers')->withPivot('value')->withTimestamps();
    }
    public function dateFormatCreatedYear()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y');
    }
}
