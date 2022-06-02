<?php

namespace App\Infra\Database\Repositories\Concrete;

use App\Exceptions\HttpInternalErrorException;
use App\Exceptions\SystemDefaultException;
use App\Infra\Database\Repositories\Abstract\IUserRepository;
use App\Infra\Database\Repositories\RepositoryBase;
use App\Models\User;

class UserRepository extends RepositoryBase implements IUserRepository
{

    /**
     * @throws HttpInternalErrorException
     */
    public function save(User $user): void
    {
        try {
            $user->save();
        } catch (SystemDefaultException $exception) {
            $this->returnError($exception);
        }
    }

    /**
     * @throws HttpInternalErrorException
     */
    public function update(User $user): void
    {
        try {
            $user->update();
        } catch (SystemDefaultException $exception) {
            $this->returnError($exception);
        }
    }

    /**
     * @throws HttpInternalErrorException
     */
    public function delete(User $user): void
    {
        try {
            $user->delete();
        } catch (SystemDefaultException $exception) {
            $this->returnError($exception);
        }
    }
}
