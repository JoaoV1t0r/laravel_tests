<?php

namespace App\Domains\Auth\Models;

use App\Models\Role;
use App\Models\User;
use App\Support\Models\Model;
use Illuminate\Database\Eloquent\Collection;
use JetBrains\PhpStorm\Pure;

class MyUserModel extends Model
{
    protected User $data_user;
    protected Role $me_role;
    protected Collection $my_permissions;

    #[Pure] public static function builder(): static
    {
        return new MyUserModel();
    }

    /**
     * @return User
     */
    public function getDataUser(): User
    {
        return $this->data_user;
    }

    /**
     * @param User $data_user
     */
    public function setDataUser(User $data_user): void
    {
        $this->data_user = $data_user;
    }

    /**
     * @return Role
     */
    public function getMeRole(): Role
    {
        return $this->me_role;
    }

    /**
     * @param Role $me_role
     */
    public function setMeRole(Role $me_role): void
    {
        $this->me_role = $me_role;
    }

    /**
     * @return Collection
     */
    public function getMyPermissions(): Collection
    {
        return $this->my_permissions;
    }

    /**
     * @param Collection $my_permissions
     */
    public function setMyPermissions(Collection $my_permissions): void
    {
        $this->my_permissions = $my_permissions;
    }

}
