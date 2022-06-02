<?php

namespace App\Domains\Users\Services\Concrete;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserStoreRequest;
use App\Notifications\User\UserConfirmEmailNotification;
use App\Notifications\User\UserConfirmAddressNotification;
use App\Domains\Users\Services\Abstract\IUsersStoreService;
use App\Infra\Database\Repositories\Abstract\IUserRepository;

class UsersStoreService implements IUsersStoreService
{
    private IUserRepository $userRepository;
    private UserStoreRequest $request;
    private User $newUser;

    /**
     * @param IUserRepository $userRepository
     * @param User $newUser
     */
    public function __construct(IUserRepository $userRepository, User $newUser)
    {
        $this->userRepository = $userRepository;
        $this->newUser = $newUser;
    }


    public function storeUser(UserStoreRequest $request): User
    {
        $this->setRequest($request);
        $this->mapNewUser();
        $this->saveNewUser();
        $this->sendNotificationConfirmAddress();
        return $this->newUser;
    }

    private function setRequest(UserStoreRequest $request)
    {
        $this->request = $request;
    }

    private function mapNewUser()
    {
        $this->newUser->name = $this->request->name;
        $this->newUser->email = $this->request->email;
        $this->newUser->password = Hash::make($this->request->password);
        $this->newUser->remember_token = Str::random(10);
    }

    private function saveNewUser()
    {
        $this->userRepository->save($this->newUser);
    }

    private function sendNotificationConfirmAddress()
    {
        $this->newUser->notify(new UserConfirmEmailNotification($this->newUser));
    }
}
