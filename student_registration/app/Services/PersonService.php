<?php

namespace App\Services;

use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class PersonService
{
    public function store($data)
    {
        $data['created_by'] =  1; //colocar Auth::user()->id; no lugar de '1' apenas para teste
        $person = new Person();
        $person->fill($data);
        $person->save();
        return $person;
    }

    public function storeResponsibly($request)
    {
        $person = new Person();
        $person->name = $request->name1;
        $person->cpf = $request->cpf1;
        $person->rg = $request->rg1;
        $person->phone1 = $request->phone3;
        $person->phone2 = $request->phone4;
        $person->emitter_rg = $request->emitter_rg1;
        $person->nis = $request->nis1;
        $person->created_by = Auth::user()->id;
        $person->save();
        return $person;
    }
}
