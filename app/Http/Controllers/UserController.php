<?php

namespace App\Http\Controllers;

use App\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use App\Models\User;


class UserController extends Controller
{

    public function __construct(
        private readonly UserServiceInterface $UserService
    ){}
    
    public function index($limit)
    {
        $recentusers = $this->UserService->getRecentUsers($limit);
        $refindusers = [];

        foreach ($recentusers as $users) {
           $refindusers[] = [
            "id" => $users['id'],
            "name" => $users["name"],
            "email" => $users["email"]
           ];
        }

        return view('show', [ 'recentuser' => $recentusers ]);
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
