<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentifyingDocumentType extends Model
{
    public function details(){
        return $this->hasOne(DocumentDetail::class, 'document_type_id');
    }

    public function registration(){
        return $this->belongsTo(Registration::class, 'registration_id');
    }
    use HasFactory;
}
