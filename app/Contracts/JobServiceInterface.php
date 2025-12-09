<?php

namespace App\contracts;


interface JobServiceInterface
{
    public function getAllJobTypes(): array;
}