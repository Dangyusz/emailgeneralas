<?php

namespace App\Http\Controllers;

use App\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
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
        private readonly UserServiceInterface $userService,
        private readonly UserRepository $userRepository,
        private readonly CompanyRepository $companyRepo,
        private readonly UserRepository $userRepo,

    ) {
    }

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

        return view('show', ['recentuser' => $recentusers]);
    }

    public function find($id)
    {
        $user = $this->userService->find($id);



        //$user -> company_name = $this->companyRepo->getCompanyNameByUserId($id);



        return view('account', ['user' => $user]);
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

        $userarray = [
            'name' => $request->input('name'),
            'email' => $request['email'],
            'password' => Hash::make($request->input('password')),
            'c_name' => $request->input('c_name') ?? 'test company',
            'piclink' => $request->input('piclink') ?? 'testlink',
            'tell' => $request->input('tell') ?? 'testtell',
            'job_title' => $request->input('job_title') ??'testjob',
        ];

        $this->userRepository->create($userarray);

        return redirect()->route('home')->with('success', 'User registered successfully!');

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

        return view('account_settings', compact('user'));
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
            'tell' => 'nullable|string|max:20',
            'c_name' => 'nullable|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
            'piclink' => 'nullable|string',
        ]);

        $dataToUpdate = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'tell' => $validated['tell'],
            'c_name' => $validated['c_name'],
            'job_title' => $validated['job_title'],
            'piclink' => $validated['piclink'],
            
        ];

        if (!empty($validated['password'])) {
            $dataToUpdate['password'] = bcrypt($validated['password']);
        }

        $this->userRepo->update($dataToUpdate, $id);

       return redirect('/account/' . $id);
    }

    

    public function updatepassword(Request $request)
    {
        $user = $this->userRepo->FindByEmail($request->input('email'));

        if (!$user) {
            return redirect()->route('/forgot-password')->with('error', 'User not found.');
        }

        /*$user = $this->userRepo->find($id);*/


        $validated = $request->validate([
            'password' => 'required|string|min:6',
        ]);

        $dataToUpdate = [
            'password' => bcrypt($validated['password']),
        ];

        $this->userRepo->update($dataToUpdate, $id);

        return redirect('/UpPass ')->with('success', 'Password updated successfully!');


        
        
    }   
    
}




