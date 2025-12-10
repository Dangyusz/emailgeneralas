<?php

namespace App\Http\Controllers;

use App\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;

use App\Services\UserService;
use Illuminate\Contracts\View\View;
use App\Models\User;


class UserController extends Controller
{

    public function __construct(
        private readonly UserServiceInterface $userService,
        private readonly CompanyRepository $companyRepo,
        private readonly UserRepository $userRepo,
    
    ){}
    
    public function recent($limit)
    {
        $recentusers = $this->userService->getRecentUsers($limit);
        

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
        $user = $this->userService->find($id);

    

        $user -> company_name = $this->companyRepo->getCompanyNameByUserId($id);

       

        return view('userbyid', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, string $id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
      public function edit(int $id)
    {
        $user = $this->userRepo->find($id);

        return view('edit', compact('user')); 
    }

    // Form feldolgozása
    public function update(Request $request, int $id)
    {
        $user = $this->userRepo->find($id);

        if (!$user) {
            return redirect()->route('index')->with('error', 'User not found.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $dataToUpdate = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            
        ];

        if (!empty($validated['password'])) {
            $dataToUpdate['password'] = bcrypt($validated['password']);
        }

        $this->userRepo->update($dataToUpdate, $id);

        return redirect('/home')->with('success', 'User updated successfully!');
    }
}

   

