<?php

namespace App\Infra\Database\Repositories\Abstract;

use App\Models\User;

interface IUserRepository
{
    public function save(User $user): void;

    public function update(User $user): void;

    public function delete(User $user): void;
}
