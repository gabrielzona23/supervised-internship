<?php

namespace App\Services;

use App\Models\Responsibly;

class ResponsiblyService
{

    public function store($data)
    {
        $responsibly = new Responsibly();
        $responsibly->kinship = $data['kinship'];
        $responsibly->family_bag = $data['family_bag'];
        $responsibly->person_id = $data['person_id'];
        $responsibly->created_by = 1; //
        $responsibly->save();

        return $responsibly;
    }
}
