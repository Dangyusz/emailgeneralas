<?php

namespace App\Http\Controllers;
use App\Contracts\JobServiceInterface;

class JobController extends Controller
{
    public function __construct(
        private readonly JobServiceInterface $JobService
    ){}

    public function Jobs()
    {
        $job_types = $this->JobService->getAllJobTypes();
        return view('job_types', ['job_types' => $job_types]);
    }
}
