<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    protected $fillable = [
        'image_authorization', 'parents_divorced', 'guard_document', 'student_custody', 'number_card_family_bag', 'student_id'
    ];
    const VALIDATORS_STORE = [
        'name' => ['bail', 'required', 'string', 'max:64'],
        'rg' => ['bail', 'max:20'],
        'cpf' => ['bail', 'max:14'],
        'born_state' => ['bail', 'required', 'max:32'],
        'born_city' => ['bail', 'required', 'max:32'],
        'emitter_rg' => ['bail', 'required_unless:rg,null', 'max:16'],
        'gender' => ['bail', 'max:64'],

        'job' => ['bail', 'max:32'],

        'born_date' => ['bail', 'required', 'date', 'before_or_equal:yesterday', 'min:10', 'max:10'],
        'nationality' => ['bail', 'required', 'max:32'],
        'number_car_sus' => ['bail', 'max:32'],
        'g_mus' => ['bail', 'max:64'],
        'inep_code' => ['bail', 'max:32'],
        'color' => ['bail', 'max:32'],
        'breed' => ['bail', 'max:32'],
        'has_special_needs' => ['bail', 'required', 'boolean'],
        'special_educational_needs' => ['bail', 'required_unless:has_special_needs,0', 'max:64'],

        'phone1' => ['bail', 'required', 'min:7', 'max:15'],
        'phone2' => ['bail', 'max:15'],
        'programs' => ['bail', 'required', 'max:64'],
        'nis' => ['bail', 'max:32'],

        'street' => ['bail', 'required', 'string', 'max:64'],
        'city' => ['bail', 'required', 'max:32'],
        'state' => ['bail', 'required', 'max:32'],
        'neighborhood' => ['bail', 'required', 'max:32'],
        'cep' => ['bail', 'required', 'max:12'],
        'number' => ['bail', 'required', 'max:15'],
        'residential_area' => ['bail', 'required'],
        'reference' => ['bail'],

        'type_transport' => ['bail'],
        'route' => ['bail', 'max:32'],

        'name1' => ['bail', 'required', 'string', 'max:64'],
        'cpf1' => ['bail', 'required', 'min:14', 'max:14'],
        'rg1' => ['bail', 'required', 'min:5', 'max:20'],
        'emitter_rg1' => ['bail', 'required', 'max:16'],
        'nis1' => ['bail', 'max:32'],

        'number_car_family_bag' => ['bail', 'max:32'],
        'family_bag' => ['bail', 'required'],
        'kinship' => ['bail', 'max:64'],

        'phone3' => ['bail', 'required', 'min:7', 'max:15'],
        'phone4' => ['bail', 'max:15'],

        'student_custody' => ['bail', 'max:32'],

        'document_model' => ['bail', 'required', 'in:new,old,others'],
        'document_number' => ['bail', 'required', 'string', 'max:32'],
        'name_registry' => ['required_if:document_model,old', 'max:255'],
        'emission_date' => ['required_if:document_model,old',],
        'term_number' => ['required_if:document_model,old', 'max:64'],
        'sheet_number' => ['required_if:document_model,old', 'max:64'],
        'book_number' => ['required_if:document_model,old', 'max:64'],
        'state_registry' => ['required_if:document_model,old', 'max:64']
    ];

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

    public function educationalInformation()
    {
        return $this->hasOne(EducationalInformation::class, 'registration_id');
    }

    public function familyGroups()
    {
        return $this->hasOne(FamilyGroup::class);
    }

    public function identifyingDocuments()
    {
        return $this->hasOne(IdentifyingDocumentType::class);
    }

    public function studentHealths()
    {
        return $this->belongsToMany(StudentHealth::class, 'registration_student_health', 'registration_id');
    }

    public function booleanAnswers()
    {
        return $this->hasMany(BooleanAnswer::class);
    }

    public function textualAnswers()
    {
        return $this->hasMany(TextualAnswer::class);
    }

    public function scalesAnswers()
    {
        return $this->hasMany(ScaleAnswer::class);
    }

    public function vaccines()
    {
        return $this->belongsToMany(Registration::class)->withPivot('expiration');
    }

    public function responsiblies()
    {
        return $this->belongsToMany(Responsibly::class, 'registration_responsibly')->withPivot('current');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function lastUpdatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function setSchoolYearAttribute($value)
    {
        $this->attributes['school_year'] = Carbon::createFromFormat('Y', $value);
    }
    use HasFactory;
}
