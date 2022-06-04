<?php

namespace App\Domains\Auth\Services\Concrete;

use App\Domains\Auth\Models\MyUserModel;
use App\Domains\Auth\Services\Abstract\IAuthMyUserService;
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
        $this->myUser->setUuid(auth()->user()->uuid);
        $this->myUser->setName(auth()->user()->name);
        $this->myUser->setEmail(auth()->user()->email);
        $this->myUser->setEmailVerifiedAt(auth()->user()->email_verified_at);
        $this->myUser->setCreatedAt(auth()->user()->created_at);
        $this->myUser->setUpdatedAt(auth()->user()->updated_at);

    }
}
