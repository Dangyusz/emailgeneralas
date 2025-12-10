<?php

namespace App\Repositories;


use app\Models\EmailSignature;
use App\Contracts\EmailSignatureRepositoryInterface;
use App\Repositories\BaseRepository;




class EmailSignatureRepository extends BaseRepository implements EmailSignatureRepositoryInterface
{
    public function __construct(EmailSignature $model)
    {
        parent::__construct( $model);
    }
    public function FindByUserId(int $id): EmailSignature
    {
        return $this->model->where('user_id', "=", $id)->firstOrFail();
    }
}