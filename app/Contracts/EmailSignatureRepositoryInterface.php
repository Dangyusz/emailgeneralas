<?php 

namespace App\Contracts;

use App\Models\EmailSignature;
use Illuminate\Validation\Rules\Email;


interface EmailSignatureRepositoryInterface extends BaseRepositoryInterface
{
   public function FindByUserId(int $id): EmailSignature;




}


