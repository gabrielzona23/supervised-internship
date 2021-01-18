<?php

namespace App\Services;

use App\Models\Registration;

class RegistrationService
{
    public function store($request)
    {
        $registration = new Registration();
        $registration->fill($request);
        $registration->created_by = 1; //colocar Auth::user()->id; no lugar de '1' apenas para teste
        $registration->updated_by = 1; //colocar Auth::user()->id; no lugar de '1' apenas para teste
        $registration->save();
        return $registration;
    }
}
