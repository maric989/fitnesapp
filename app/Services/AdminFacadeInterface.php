<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface AdminFacadeInterface
{
    public function getListPaginated(?array $filters): LengthAwarePaginator;
}
