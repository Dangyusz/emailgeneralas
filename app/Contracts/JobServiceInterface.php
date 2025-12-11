<?php

namespace App\Contracts;


interface JobServiceInterface
{
    public function getAllJobTypes(): array;
}