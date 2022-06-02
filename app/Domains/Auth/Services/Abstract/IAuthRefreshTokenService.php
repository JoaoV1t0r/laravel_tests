<?php

namespace App\Domains\Auth\Services\Abstract;

interface IAuthRefreshTokenService
{
    public function refreshToken(): array;
}
