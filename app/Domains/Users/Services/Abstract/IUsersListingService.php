<?php

namespace App\Domains\Users\Services\Abstract;

use App\Http\Requests\Users\UserListingRequest;
use App\Support\Models\PaginatedList;
use Illuminate\Support\Collection;

interface IUsersListingService
{
    public function getUsersPaginated(UserListingRequest $request): PaginatedList;

    public function getUsersListing(): Collection;
}
