<?php

namespace App\Services;


use App\Contracts\EmailSignatureServiceInterface;
use App\Contracts\UserRepositoryInterface;



class EmailSignatureService implements EmailSignatureServiceInterface{

    public function __construct(
        private readonly UserRepositoryInterface $UserRepository,
    ){}

    


}