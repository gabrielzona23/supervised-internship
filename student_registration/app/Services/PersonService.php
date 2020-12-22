<?php

namespace App\Services;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonService
{
    private $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }

    public function store(Request $request)
    {
        $this->person->name = $request->input('name');
        $this->person->born_state = $request->input('born_state');
        $this->person->born_city = $request->input('born_city');
        $this->person->cpf = $request->input('cpf');
        $this->person->rg = $request->input('rg');
        $this->person->emitter_rg = $request->input('emitter_rg');
        $this->person->gender = $request->input('gender');
        $this->person->created_by = 1; //colocar Auth::user()->id; no lugar de '1' apenas para teste
        $this->person->save();
    }
}
