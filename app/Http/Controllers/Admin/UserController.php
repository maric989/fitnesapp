<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enum\User\UserRoleEnum;
use App\Models\User;

class UserController extends Controller
{
    public function paginateUsers()
    {
        $users = User::whereHas('role', function ($q) {
            $q->where('name', '!=', UserRoleEnum::ADMIN);
        })->paginate();

        dd($users);
    }
}
