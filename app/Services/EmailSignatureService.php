<?php

namespace App\Services;


use App\Contracts\EmailSignatureServiceInterface;
use App\Contracts\UserRepositoryInterface;



class EmailSignatureService implements EmailSignatureServiceInterface{

    public function __construct(

        //ide kellenek maajd azok az interfacek amiket hasznalni fogunk
        private readonly UserRepositoryInterface $UserRepository,

    ){}


}