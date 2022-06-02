<?php

namespace App\Infra\Database\Dao\Users\Concrete;

use App\Domains\Users\Models\UserListingModel;
use App\Infra\Database\Config\DbBase;
use App\Infra\Database\Dao\Users\Abstract\IUsersListingDb;
use App\Support\Models\PaginatedList;
use App\Support\Models\Pagination;
use Illuminate\Support\Collection;
use stdClass;

class UserListingDb extends DbBase implements IUsersListingDb
{
    private Collection $users;

    public function getUsersListing(): Collection
    {
        $userId = auth()->user()->id;
        $sql = <<<SQL
            SELECT
                s.uuid as userUuid,
                s.name as userName,
                s.email as userEmail,
                s.created_at as dateCreateUser,
                s.active as isActive
            FROM
                 users s
            WHERE
                s.id NOT IN ($userId)
                AND s.deleted_at IS NULL
        SQL;
        $resultArray = $this->db->select($sql);
        $this->users = collect($resultArray);
        $this->users = $this->users->map($this->mapper());
        return $this->users;
    }

    private function mapper(): callable
    {
        return function (stdClass $row): UserListingModel {
            $user = UserListingModel::builder();
            $user->setUserName($row->userName);
            $user->setUserEmail($row->userEmail);
            $user->setDateCreateUser($row->dateCreateUser);
            $user->setIsActive($row->isActive);
            $user->setUserUuid($row->userUuid);
            return $user;
        };
    }

    public function getUsersPaginatedList(Pagination $pagination, array $filter): PaginatedList
    {
        $queryPagination = $this->db
            ->table('users')
            ->select([
                "uuid as userUuid",
                "name as userName",
                "email as userEmail",
                "created_at as dateCreateUser",
                "active as isActive",
            ])
            ->where($this->getFilter($filter))
            ->whereNull('deleted_at')
            ->whereNotIn('id', [auth()->user()->id])
            ->orderBy('created_at')
            ->paginate($pagination->perPage);
        $paginatedList = PaginatedList::builderByEloquentPagination($queryPagination, $pagination);

        $this->users = $paginatedList->list;
        $paginatedList->list = $this->users;
        $mappedList = $paginatedList->list->map($this->mapper());
        return $paginatedList->setList($mappedList);
    }

    private function getFilter(array $filter): array
    {
        $filterDb = array();

        if (isset($filter['isActive']) && $filter['isActive'] != null) :
            $filterDb[] = ['active', '=', $filter['isActive']];
        endif;

        if (isset($filter['userName']) && $filter['userName'] != null) :
            $userName = "%" . strtoupper($filter['userName']) . "%";
            $filterDb[] = ['name', 'like', $userName];
        endif;

        if (isset($filter['userEmail']) && $filter['userEmail'] != null) :
            $userEmail = "%" . strtoupper($filter['userEmail']) . "%";
            $filterDb[] = ['email', 'like', $userEmail];
        endif;

        return $filterDb;
    }
}
