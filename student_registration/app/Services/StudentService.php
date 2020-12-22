<?php

namespace App\Services;

use Illuminate\Http\Request;

class StudentService
{
    private $student;

    public function __construct($student)
    {
        $this->student = $student;
    }

    public function store(Request $request)
    {


    }
}
