<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    public function documents(){
        return $this->belongsToMany(Document::class);
    }

    public function educational_information(){
        return $this->hasOne(EducationalInformation::class, 'registration_id');
    }

    public function family_groups(){
        return $this->hasOne(FamilyGroup::class);
    }

    public function identifying_documents(){
        return $this->hasOne(IdentifyingDocumentType::class);
    }

    public function student_healths(){
        return $this->belongsToMany(StudentHealth::class, 'registration_student_health', 'registration_id');
    }

    use HasFactory;
}
