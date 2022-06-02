<?php

namespace App\Infra\Database\Dao\Users\Abstract;

use App\Support\Models\PaginatedList;
use App\Support\Models\Pagination;
use Illuminate\Support\Collection;

interface IUsersListingDb
{
    public function getUsersListing(): Collection;

    public function getUsersPaginatedList(Pagination $pagination, array $filter): PaginatedList;
}
