<?php

namespace App\Domains\Users\Services\Abstract;

interface IUsersVerifyEmailService
{
    public function verifyEmail(string $userUuid): bool;
}
