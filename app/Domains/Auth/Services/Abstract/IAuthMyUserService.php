<?php

namespace App\Domains\Auth\Services\Abstract;

use App\Domains\Auth\Models\MyUserModel;

interface IAuthMyUserService
{
    public function getMyUser(): MyUserModel;
}
