<?php

namespace App\Models;

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

    public function programs()
    {
        return $this->belongsToMany(Program::class);
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
}
