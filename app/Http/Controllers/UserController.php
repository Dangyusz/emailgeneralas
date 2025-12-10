<?php

namespace App\Http\Controllers;

use App\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use App\Models\User;
use App\Http\Controllers\Input;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use app\Repositories\UserRepository;



class UserController extends Controller
{

    public function __construct(
        private readonly UserServiceInterface $UserService,
        private readonly UserRepository $userRepository
    ){}
    
    public function recent($limit)
    {
        $recentusers = $this->UserService->getRecentUsers($limit);
        

        foreach ($recentusers as $users) {
           $refindusers[] = [
            "id" => $users['id'],
            "name" => $users["name"],
            "email" => $users["email"]
           ];
        }

        return view('show', [ 'recentuser' => $recentusers ]);
    }

     public function find($id)
    {
        $user = $this->UserService->find($id);

        return view('userbyid', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userarray = [
            'c_name' -> $request -> input('c_name'),
            'name' -> $request->input('name'),
            'email'-> $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'piclink' -> $request->input('piclink'), 
            'tell' -> $request -> input('tell'),
            'job_title' -> $request -> input('job_title')
        ];

        $this->userRepository->create($userarray);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
