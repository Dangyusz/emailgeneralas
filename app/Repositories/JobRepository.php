<?php

namespace App\Repositories;

use App\Contracts\JobRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\Job_type;
class JobRepository extends BaseRepository implements JobRepositoryInterface
{
    public function __construct(Job_type $model)
    {
        parent::__construct($model);
    }
    
    
}