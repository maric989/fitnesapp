<?php

namespace App\Services\User\Facade;

use App\Models\Enum\User\UserRoleEnum;
use App\Models\User;
use App\Services\AdminFacadeInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminUserFacade implements AdminFacadeInterface
{
    public function getListPaginated(): LengthAwarePaginator
    {
        return User::whereHas('role', function ($q) {
            $q->where('name', '!=', UserRoleEnum::ADMIN);
        })->paginate();
    }
}
