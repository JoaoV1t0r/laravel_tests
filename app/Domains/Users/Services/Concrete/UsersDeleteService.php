<?php

namespace App\Domains\Users\Services\Concrete;

use App\Domains\Users\Services\Abstract\IUsersDeleteService;
use App\Exceptions\HttpBadRequest;
use App\Http\Requests\Users\UserDeleteRequest;
use App\Infra\Database\Repositories\Abstract\IUserRepository;
use App\Models\User;

class UsersDeleteService implements IUsersDeleteService
{
    private IUserRepository $userRepository;
    private User $deleteUser;
    private UserDeleteRequest $request;

    /**
     * @param IUserRepository $userRepository
     */
    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws HttpBadRequest
     */
    public function userDelete(UserDeleteRequest $request): void
    {
        $this->setRequest($request);
        $this->setUserDelete();
        $this->validUserIsYourSelf();
        $this->deleteUser();
    }

    private function setRequest(UserDeleteRequest $request): void
    {
        $this->request = $request;
    }

    private function setUserDelete()
    {
        $this->deleteUser = User::findByUuid($this->request->userUuid);
    }

    /**
     * @throws HttpBadRequest
     */
    private function validUserIsYourSelf()
    {
        if (auth()->user()->id === $this->deleteUser->id) :
            throw new HttpBadRequest("You can't delete!");
        endif;
    }

    private function deleteUser()
    {
        $this->userRepository->delete($this->deleteUser);
    }
}
