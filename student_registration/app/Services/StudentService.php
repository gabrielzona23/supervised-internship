<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{

    public function store($data)
    {
        $data['created_by'] =  1; //colocar Auth::user()->id; no lugar de '1' apenas para teste
        $student = Student::create($data);
        return $student;
    }
}
