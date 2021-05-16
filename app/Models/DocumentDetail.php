<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentDetail extends Model
{
    public function identifying_document(){
        return $this->belongsTo(IdentifyingDocumentType::class, 'document_type_id');
    }
    use HasFactory;
}
