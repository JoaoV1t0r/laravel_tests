<?php

namespace App\Providers\DependencyInjection;

use App\Domains\Auth\Services\Abstract\IAuthLoginService;
use App\Domains\Auth\Services\Abstract\IAuthMyUserService;
use App\Domains\Auth\Services\Abstract\IAuthRefreshTokenService;
use App\Domains\Auth\Services\Concrete\AuthLoginService;
use App\Domains\Auth\Services\Concrete\AuthMyUserService;
use App\Domains\Auth\Services\Concrete\AuthRefreshTokenService;

class AuthDi extends DependencyInjection
{
    protected function servicesConfiguration(): array
    {
        return [
            [IAuthLoginService::class, AuthLoginService::class],
            [IAuthMyUserService::class, AuthMyUserService::class],
            [IAuthRefreshTokenService::class, AuthRefreshTokenService::class],
        ];
    }

    protected function mappersConfiguration(): array
    {
        return [];
    }

    protected function daoConfigurations(): array
    {
        return [];
    }

    protected function repositoriesConfigurations(): array
    {
        return [];
    }
}
