<?php

namespace App\Domains\Auth\Services\Abstract;

use App\Http\Requests\Auth\AuthLoginRequest;

interface IAuthLoginService
{
    public function login(AuthLoginRequest $request): array;
}
