<?php

namespace App\Models\Enum\User;

use App\Models\Enum\Enum;

class UserRoleEnum extends Enum
{
    const ADMIN = 'admin';
    const PREMIUM = 'premium';
    const TRIAL = 'trial';
    const GUEST = 'guest';
}
