<?php

namespace App\Services;

use App\Models\Job;
use Illuminate\Http\Request;

class JobService
{
    private $job;

    public function __construct($job)
    {
        $this->job = $job;
    }

    public function store(Request $request)
    {
        $job = new Job();
        $job->name = $request->input('job');
        $job->save();
    }
}
