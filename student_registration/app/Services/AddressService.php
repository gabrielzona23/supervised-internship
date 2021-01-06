<?php

namespace App\Services;

use App\Models\Address;

class AddressService
{
    public function store($data)
    {
        $address = new Address();
        $address->fill($data);
        $address->save();
        $address->persons()->attach($data['person_id']);
        return $address;
    }
}
