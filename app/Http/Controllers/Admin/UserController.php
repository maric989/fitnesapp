<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\User\Facade\AdminUserFacade;

class UserController extends Controller
{
    private AdminUserFacade $facade;

    public function __construct(AdminUserFacade $adminUserFacade)
    {
        $this->facade = $adminUserFacade;
    }

    public function paginateUsers()
    {
        $users = $this->facade->getListPaginated();

        dd($users);
    }

    public function getUser(User $user)
    {
        dd($user);
    }

    public function editUser(User $user)
    {
        dd($user);
    }

    public function updateUser(User $user)
    {
        dd($user);
    }
}
