<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    public function documents(){
        return $this->belongsToMany(Document::class);
    }

    public function educationalInformation(){
        return $this->hasOne(EducationalInformation::class, 'registration_id');
    }

    public function familyGroups(){
        return $this->hasOne(FamilyGroup::class);
    }

    public function identifyingDocuments(){
        return $this->hasOne(IdentifyingDocumentType::class);
    }

    public function studentHealths(){
        return $this->belongsToMany(StudentHealth::class, 'registration_student_health', 'registration_id');
    }

    public function booleanAnswers(){
        return $this->hasMany(BooleanAnswer::class);
    }

    public function textualAnswers(){
        return $this->hasMany(TextualAnswer::class);
    }

    public function scalesAnswers(){
        return $this->hasMany(ScaleAnswer::class);
    }

    public function vaccines(){
        return $this->belongsToMany(Registration::class)->withPivot('expiration');
    }

    public function responsiblies(){
        return $this->belongsToMany(Responsibly::class,'registration_responsibly')->withPivot('current');
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function lastUpdatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }

    use HasFactory;
}
