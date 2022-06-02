<?php

namespace App\Domains\Users\Services\Abstract;

use App\Models\User;
use App\Http\Requests\User\UserStoreRequest;

interface IUsersStoreService
{
    public function storeUser(UserStoreRequest $request): User;
}
