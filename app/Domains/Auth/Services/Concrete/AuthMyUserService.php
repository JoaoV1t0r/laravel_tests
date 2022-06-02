<?php

namespace App\Domains\Auth\Services\Concrete;

use App\Domains\Auth\Models\MyUserModel;
use App\Domains\Auth\Services\Abstract\IAuthMyUserService;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use JetBrains\PhpStorm\Pure;

class AuthMyUserService implements IAuthMyUserService
{
    private MyUserModel $myUser;

    #[Pure] public function __construct()
    {
        $this->myUser = MyUserModel::builder();
    }


    public function getMyUser(): MyUserModel
    {
        $this->mapMyUser();
        return $this->myUser;
    }

    private function mapMyUser()
    {
        $this->myUser->setDataUser(User::find(auth()->user()->id));
        $this->myUser->setMeRole(auth()->user()->role);
        $this->myUser->setMyPermissions($this->getPermissions());

    }

    private function getPermissions(): Collection
    {
        $permissions = new Collection();
        foreach (auth()->user()->permissions as $permission_role):
            $permissions->add(Permission::find($permission_role->permission_id));
        endforeach;
        return $permissions;
    }
}
