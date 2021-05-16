<?php

namespace App\Services;

use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class RegistrationService
{
    public function store($request)
    {
        $registration = new Registration();
        $registration->fill($request);
        $registration->created_by = Auth::user()->id;
        $registration->updated_by = Auth::user()->id;
        $registration->save();
        return $registration;
    }
}
