<?php

namespace App\Domains\Users\Services\Abstract;

use App\Http\Requests\Users\UserDeleteRequest;

interface IUsersDeleteService
{
    public function userDelete(UserDeleteRequest $request): void;
}
