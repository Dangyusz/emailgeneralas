<?php

namespace App\Http\Controllers;
use App\Contracts\CompanyServiceInterface;
use Illuminate\Http\Request;



class CompanyController extends Controller
{
        public function __construct(
        private readonly CompanyServiceInterface $CompanyService
    ){}

    public function index($limit)
    {
        $companies = $this->CompanyService->getCompanies($limit);
        

        foreach ($companies as $cs) {
           $refindusers[] = [
            "id" => $cs['id'],
            "name" => $cs['name']
         
           ];
        }

        return view('show1', [ 'company' => $companies ]);
    }
}


