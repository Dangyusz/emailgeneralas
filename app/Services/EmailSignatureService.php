<?php

namespace App\Services;


use App\Contracts\EmailSignatureServiceInterface;



class EmailSignatureService implements EmailSignatureServiceInterface{

    public function __construct(

        //ide kellenek maajd azok az interfacek amiket hasznalni fogunk
        private readonly UserRepositoryInterface $UserRepository,
        private readonly JobRepositoryInterface $JobRepository
    ){}

    }