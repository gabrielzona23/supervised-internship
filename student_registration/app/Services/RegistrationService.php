<?php

namespace App\Services;

use App\Models\Registration;

class RegistrationService
{
    public function store($request)
    {
        $registration = new Registration();
        if (isset($request['image_authorization'])) {
            $request['image_authorization'] = $request['image_authorization'] == 'on' ? true : false;
        }
        if (isset($request['parents_divorced'])) {
            $request['parents_divorced'] = $request['parents_divorced'] == 'on' ? true : false;
        }
        if (isset($request['guard_document'])) {
            $request['guard_document'] = $request['guard_document'] == 'on' ? true : false;
        }
        $registration->fill($request);
        $registration->created_by = 1; //colocar Auth::user()->id; no lugar de '1' apenas para teste
        $registration->updated_by = 1; //colocar Auth::user()->id; no lugar de '1' apenas para teste
        $registration->save();
        return $registration;
    }
}
