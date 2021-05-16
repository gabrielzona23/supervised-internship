<?php

namespace App\Services;

use App\Models\Responsibly;
use Illuminate\Support\Facades\Auth;

class ResponsiblyService
{

    public function store($data)
    {
        $responsibly = new Responsibly();
        $responsibly->kinship = $data['kinship'];
        $responsibly->family_bag = $data['family_bag'];
        $responsibly->person_id = $data['person_id'];
        $responsibly->created_by = Auth::user()->id;
        $responsibly->save();

        return $responsibly;
    }
}
