<?php

namespace App\Services;
use App\Contracts\JobRepositoryInterface;
use App\Contracts\JobServiceInterface;


class JobService implements JobServiceInterface{

    public function __construct(
    private readonly JobRepositoryInterface $JobRepository){}

    public function getAllJobTypes(): array
    {
        return $this->JobRepository->all()->toArray();
    }



   

    
}