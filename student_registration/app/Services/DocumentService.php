<?php

namespace App\Services;

use App\Models\DocumentDetail;
use App\Models\IdentifyingDocumentType;
use Illuminate\Http\Request;

class DocumentService
{
    private function filterRegistration($request)
    {

        $data = $request->only([
            'document_model',
            'document_number',
            'name_registry',
            'city_registry',
            'state_registry',
            'term_number',
            'sheet_number',
            'book_number',
            'emission_date',
            'type_of_certificate'
        ]);
        return $data;
    }
    public function store(Request $request, $registration)
    {
        $data = $this->filterRegistration($request);
        $identifying_document_types = new IdentifyingDocumentType();
        $identifying_document_types->model = $data['document_model'];
        $identifying_document_types->document_number = $data['document_number'];
        $identifying_document_types->registration_id = $registration->id;
        $identifying_document_types->save();

        if ($data['document_model'] == 'old') {

            $documentDetail = new DocumentDetail();
            $documentDetail->type_of_certificate = $data['type_of_certificate'];
            $documentDetail->name_registry = $data['name_registry'];
            $documentDetail->city_registry = $data['city_registry'];
            $documentDetail->state_registry = $data['state_registry'];
            $documentDetail->term_number = $data['term_number'];
            $documentDetail->sheet_number = $data['sheet_number'];
            $documentDetail->book_number = $data['book_number'];
            $documentDetail->emission_date = $data['emission_date'];
            $documentDetail->document_type_id = $identifying_document_types->id;
            $documentDetail->save();
        }
        return $identifying_document_types;
    }
}
