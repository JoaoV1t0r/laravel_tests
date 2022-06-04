<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Support\Models\BaseResponse;
use App\Exceptions\SystemDefaultException;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\Users\UserDeleteRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Users\UserListingRequest;
use App\Domains\Users\Services\Abstract\IUsersStoreService;
use App\Domains\Users\Services\Abstract\IUsersDeleteService;
use App\Domains\Users\Services\Abstract\IUsersUpdateService;
use App\Domains\Users\Services\Abstract\IUsersListingService;
use App\Domains\Users\Services\Abstract\IUsersVerifyEmailService;

class UserController extends Controller
{
    private IUsersListingService $usersListingService;
    private IUsersStoreService $usersStoreService;
    private IUsersUpdateService $usersUpdateService;
    private IUsersDeleteService $usersDeleteService;
    private IUsersVerifyEmailService $usersVerifyEmailService;

    /**
     * @param IUsersListingService $usersListingService
     * @param IUsersStoreService $usersStoreService
     * @param IUsersUpdateService $usersUpdateService
     * @param IUsersDeleteService $usersDeleteService
     * @param IUsersVerifyEmailService $usersVerifyEmailService
     */
    public function __construct(
        IUsersListingService $usersListingService,
        IUsersStoreService   $usersStoreService,
        IUsersUpdateService  $usersUpdateService,
        IUsersDeleteService  $usersDeleteService,
        IUsersVerifyEmailService $usersVerifyEmailService,
    ) {
        $this->usersListingService = $usersListingService;
        $this->usersStoreService = $usersStoreService;
        $this->usersUpdateService = $usersUpdateService;
        $this->usersDeleteService = $usersDeleteService;
        $this->usersVerifyEmailService = $usersVerifyEmailService;
    }


    public function index(UserListingRequest $request): Response
    {
        try {
            $userListing = $request->hasPagination()
                ? $this->usersListingService->getUsersPaginated($request)
                : $this->usersListingService->getUsersListing();
            return BaseResponse::builder()
                ->setMessage('Successfully listing user!')
                ->setData($userListing)
                ->response();
        } catch (SystemDefaultException $exception) {
            return $exception->response();
        }
    }

    public function store(UserStoreRequest $request): Response
    {
        try {
            $newUser = $this->usersStoreService->storeUser($request);
            return BaseResponse::builder()
                ->setMessage('Successfully create user!')
                ->setData($newUser)
                ->response();
        } catch (SystemDefaultException $exception) {
            return $exception->response();
        }
    }

    public function update(UserUpdateRequest $request): Response
    {
        try {
            $updateUser = $this->usersUpdateService->userUpdate($request);
            return BaseResponse::builder()
                ->setMessage('Successfully update user!')
                ->setData($updateUser)
                ->response();
        } catch (SystemDefaultException $exception) {
            return $exception->response();
        }
    }

    public function delete(UserDeleteRequest $request): Response
    {
        try {
            $this->usersDeleteService->userDelete($request);
            return BaseResponse::builder()
                ->setMessage('Successfully delete user!')
                ->setData(true)
                ->setStatusCode(202)
                ->response();
        } catch (SystemDefaultException $exception) {
            return $exception->response();
        }
    }

    public function verifyEmail(string $userUuid): Response
    {
        try {
            $this->usersVerifyEmailService->verifyEmail($userUuid);
            return BaseResponse::builder()
                ->setMessage('Successfully verify email!')
                ->setData(true)
                ->setStatusCode(202)
                ->response();
        } catch (SystemDefaultException $exception) {
            return $exception->response();
        }
    }
}
