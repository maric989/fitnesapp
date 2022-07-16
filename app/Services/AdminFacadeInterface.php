<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface AdminFacadeInterface
{
    public function getListPaginated(): LengthAwarePaginator;
}
