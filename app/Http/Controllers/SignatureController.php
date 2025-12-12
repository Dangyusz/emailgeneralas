<?php

namespace App\Http\Controllers;

use App\Models\EmailSignature;
use Illuminate\Http\Request;
use App\Contracts\EmailSignatureRepositoryInterface;


class SignatureController extends Controller
{

    public function __construct(
        private readonly EmailSignatureRepositoryInterface $emailSignatureRepository,
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $emailsignature = $request->input('emailsignature');
        $user_id = $request->input('user_id');

        $data = [
            'signature' => $emailsignature,
            'user_id' => $user_id,
        ];

        $this->emailSignatureRepository->create($data);
    }

    public function listByUserId($userId)
    {
        $emailsignaturesbyid =  $this->emailSignatureRepository->getByUserId($userId); 
        // ToDo: return the correct view
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailSignature $emailSignature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailSignature $emailSignature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailSignature $emailSignature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailSignature $emailSignature)
    {
        //
    }
}
