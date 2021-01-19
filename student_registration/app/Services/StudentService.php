<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentService
{

    public function store($data)
    {
        $data['created_by'] =  Auth::user()->id;
        $student = Student::create($data);
        return $student;
    }
}
