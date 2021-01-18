<?php

namespace App\Services;

use App\Models\Address;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AddressService
{
    public function storeRegistration($data)
    {
        $address = new Address();
        $address->fill($data);
        $address->save();
        $address->students()->attach($data['student_id']);
        return $address;
    }

    public function store(Request $request, Student $student)
    {
        $data = $request->only([
            'street',
            'city',
            'state',
            'neighborhood',
            'country',
            'cep',
            'number',
            'electrical_installation_code',
            'residential_area',
            'type_transport',
            'reference',
            'complement',
            'buses_name',
            'transport_localization',
            'route',
        ]);
        $data['student_id'] = $student->id;
        foreach ($student->addresses as $address) {
            $address->where('status', 'Ativo')->update(['status' => 'Inativo']);
        }
        $address = new Address();
        $address->fill($data);
        $address->save();
        $address->students()->attach($data['student_id']);
        return $address;
    }
}
