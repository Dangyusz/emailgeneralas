<?php

namespace App\enum;

enum Tables: string
{
    case COMPANY = 'companies';
    case USERS = 'users';

    case JOB_TYPES = 'job_types';
}
