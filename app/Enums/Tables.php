<?php

namespace App\Enums;

enum Tables: string
{
    case USERS = 'users';
    case COMPANY = 'companies';
    case EMAIL_SIGNATURE = 'email_signature';
}
