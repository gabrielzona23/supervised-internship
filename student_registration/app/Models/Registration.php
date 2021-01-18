<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    protected $fillable = [
        'image_authorization', 'parents_divorced', 'guard_document', 'student_custody', 'number_card_family_bag', 'student_id', 'school_year'
    ], $dates = [
        'created_at',
        'updated_at',
        'school_year'
    ];

    const VALIDATORS_STORE = [
        'name' => ['bail', 'required', 'string', 'min:3', 'max:64'],
        'cpf' => ['bail', 'nullable', 'string', 'min:14', 'max:14'],
        'rg' => ['bail', 'nullable', 'string', 'min:5', 'max:20'],
        'born_state' => ['bail', 'required', 'string', 'min:2', 'max:32'],
        'born_city' => ['bail', 'required', 'string', 'min:2', 'max:32'],
        'emitter_rg' => ['bail', 'required_unless:rg,null', 'nullable', 'string', 'min:2', 'max:16'],
        'gender' => ['bail', 'nullable', 'string', 'max:64'],

        'job' => ['bail', 'nullable', 'string', 'min:3', 'max:32'],

        'born_date' => ['bail', 'required', 'date', 'before_or_equal:yesterday', 'min:10', 'max:10'],
        'nationality' => ['bail', 'required', 'string', 'min:2', 'max:32'],
        'number_car_sus' => ['bail', 'nullable', 'string', 'min:2', 'max:32'],
        'g_mus' => ['bail', 'nullable', 'string', 'min:2', 'max:64'],
        'inep_code' => ['bail', 'nullable', 'string', 'min:2', 'max:32'],
        'color' => ['bail', 'nullable', 'string', 'min:2', 'max:32'],
        'breed' => ['bail', 'nullable', 'string', 'min:2', 'max:32'],
        'has_special_needs' => ['bail', 'required', 'boolean'],
        'image_authorization' => ['bail', 'boolean'],
        'special_educational_needs' => ['bail', 'required_if:has_special_needs,1', 'max:64'],

        'phone1' => ['bail', 'required', 'min:14', 'max:15'],
        'phone2' => ['bail', 'nullable', 'min:14', 'max:15'],
        'programs' => ['bail', 'required', 'max:64'],
        'nis' => ['bail', 'max:32'],

        'street' => ['bail', 'required', 'string', 'min:6', 'max:64'],
        'city' => ['bail', 'required', 'min:2', 'max:128'],
        'state' => ['bail', 'required', 'min:2', 'max:64'],
        'neighborhood' => ['bail', 'required', 'min:6', 'max:64'],
        'country' => ['bail', 'required', 'min:6', 'max:64'],
        'cep' => ['bail', 'required', 'min:9', 'max:12'],
        'number' => ['bail', 'required', 'min:2', 'max:32'],
        'electrical_installation_core' => ['bail', 'max:32'],
        'residential_area' => ['bail', 'required', 'in:Rural,Urbana'],
        'type_transport' => ['bail', 'in:Público, Particular, Escolar, Variado'],
        'reference' => ['bail', 'max:255'],
        'complement' => ['bail', 'max:255'],
        'buses_name' => ['bail', 'max:64'],
        'transport_localization' => ['bail', 'max:64'],
        'route' => ['bail', 'max:64'],

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

        'phone3' => ['bail', 'required', 'string', 'min:14', 'max:15'],
        'phone4' => ['bail', 'nullable', 'string', 'min:14', 'max:15'],
        'parents_divorced' => ['bail', 'filled', 'boolean'],
        'student_custody' => ['bail', 'required_if,parents_divorced,1', 'nullable', 'string', 'min:14', 'max:32'],
        'school_year' => ['bail', 'required', 'string', 'min:4', 'max:4', 'date_format:Y', 'before_or_equal:tomorrow'],

        'document_model' => ['bail', 'required', 'in:new,old,others'],
        'document_number' => ['bail', 'required', 'string', 'max:32'],
        'name_registry' => ['bail', 'required_if:document_model,old', 'nullable', 'string', 'min:5', 'max:255'],
        'emission_date' => ['bail', 'required_if:document_model,old', 'nullable', 'string', 'min:5'],
        'term_number' => ['bail', 'required_if:document_model,old', 'max:64', 'nullable', 'string', 'min:5'],
        'sheet_number' => ['bail', 'required_if:document_model,old', 'max:64'],
        'book_number' => ['bail', 'required_if:document_model,old', 'max:64'],
        'state_registry' => ['bail', 'required_if:document_model,old', 'max:64']
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
    public function vaccines()
    {
        return $this->belongsToMany(Registration::class)->withPivot('expiration')->withTimestamps();
    }
    public function responsiblies()
    {
        return $this->belongsToMany(Responsibly::class, 'registration_responsibly')->withPivot('current')->withTimestamps();
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
