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




class UserController extends Controller
{

    public function __construct(
        private readonly UserServiceInterface $UserService
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
        $name = $request->input('name');
        $piclink = $request->input('piclink');
        $email = $request->input('email');
        $password = $request->input('password');

        DB::table('users')->insert([
            'name' => $name,
            'email'=> $email,
            'password'=> Hash::make($password),
            'piclink' => $piclink
        ]);
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
