<?php

namespace App\Domains\Users\Services\Concrete;

use App\Domains\Users\Models\UserListingModel;
use App\Domains\Users\Services\Abstract\IUsersListingService;
use App\Http\Requests\Users\UserListingRequest;
use App\Infra\Database\Dao\Users\Abstract\IUsersListingDb;
use App\Support\Models\PaginatedList;
use Illuminate\Support\Collection;

class UsersListingService implements IUsersListingService
{
    private IUsersListingDb $usersListingDb;

    /**
     * @param IUsersListingDb $usersListingDb
     */
    public function __construct(IUsersListingDb $usersListingDb)
    {
        $this->usersListingDb = $usersListingDb;
    }


    public function getUsersPaginated(UserListingRequest $request): PaginatedList
    {
        $users = $this->usersListingDb->getUsersPaginatedList($request->getPagination(), $request->all());
        $users->list = $users
            ->list
            ->map(function (UserListingModel $user): array {
                return $user->toArray();
            });
        return $users;
    }

    public function getUsersListing(): Collection
    {
        $users = $this->usersListingDb->getUsersListing();
        return $users->map(function (UserListingModel $user): array {
            return $user->toArray();
        });
    }
}
