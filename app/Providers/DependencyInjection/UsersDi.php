<?php

namespace App\Providers\DependencyInjection;

use App\Infra\Database\Dao\Users\Concrete\UserListingDb;
use App\Domains\Users\Services\Concrete\UsersStoreService;
use App\Infra\Database\Dao\Users\Abstract\IUsersListingDb;
use App\Providers\DependencyInjection\DependencyInjection;
use App\Domains\Users\Services\Abstract\IUsersStoreService;
use App\Domains\Users\Services\Concrete\UsersDeleteService;
use App\Domains\Users\Services\Concrete\UsersUpdateService;
use App\Domains\Users\Services\Abstract\IUsersDeleteService;
use App\Domains\Users\Services\Abstract\IUsersUpdateService;
use App\Domains\Users\Services\Concrete\UsersListingService;
use App\Infra\Database\Repositories\Concrete\UserRepository;
use App\Domains\Users\Services\Abstract\IUsersListingService;
use App\Infra\Database\Repositories\Abstract\IUserRepository;
use App\Domains\Users\Services\Concrete\UsersVerifyEmailService;
use App\Domains\Users\Services\Abstract\IUsersVerifyEmailService;

class UsersDi extends DependencyInjection
{
    protected function servicesConfiguration(): array
    {
        return [
            [IUsersStoreService::class, UsersStoreService::class],
            [IUsersListingService::class, UsersListingService::class],
            [IUsersUpdateService::class, UsersUpdateService::class],
            [IUsersDeleteService::class, UsersDeleteService::class],
            [IUsersVerifyEmailService::class, UsersVerifyEmailService::class],
        ];
    }

    protected function daoConfigurations(): array
    {
        return [
            [IUsersListingDb::class, UserListingDb::class],
        ];
    }

    protected function mappersConfiguration(): array
    {
        return [];
    }

    protected function repositoriesConfigurations(): array
    {
        return [
            [IUserRepository::class, UserRepository::class],
        ];
    }
} {
}
