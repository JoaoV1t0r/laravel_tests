<?php

namespace App\Http\Controllers\Api;

use App\Domains\Auth\Services\Abstract\IAuthLoginService;
use App\Domains\Auth\Services\Abstract\IAuthMyUserService;
use App\Domains\Auth\Services\Abstract\IAuthRefreshTokenService;
use App\Exceptions\SystemDefaultException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Support\Models\BaseResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    private IAuthLoginService $authLoginService;
    private IAuthMyUserService $authMyUserService;
    private IAuthRefreshTokenService $authRefreshTokenService;

    /**
     * @param IAuthLoginService $authLoginService
     * @param IAuthMyUserService $authMyUserService
     * @param IAuthRefreshTokenService $authRefreshTokenService
     */
    public function __construct(
        IAuthLoginService        $authLoginService,
        IAuthMyUserService       $authMyUserService,
        IAuthRefreshTokenService $authRefreshTokenService
    ) {
        $this->authLoginService = $authLoginService;
        $this->authMyUserService = $authMyUserService;
        $this->authRefreshTokenService = $authRefreshTokenService;
    }

    public function login(AuthLoginRequest $request): Response
    {
        try {
            $data_login = $this->authLoginService->login($request);
            return BaseResponse::builder()
                ->setMessage('Successfully login!')
                ->setData($data_login)
                ->response();
        } catch (SystemDefaultException $exception) {
            return $exception->response();
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function me(): Response
    {
        try {
            $data_my_user = $this->authMyUserService->getMyUser();
            return BaseResponse::builder()
                ->setMessage('Successfully!')
                ->setData($data_my_user)
                ->response();
        } catch (SystemDefaultException $exception) {
            return $exception->response();
        }
    }

    public function logout(): Response
    {
        auth()->logout();
        return BaseResponse::builder()
            ->setData(false)
            ->setMessage('Successfully logged out')
            ->response();
    }

    public function refresh(): Response
    {
        try {
            $data_refresh_token = $this->authRefreshTokenService->refreshToken();
            return BaseResponse::builder()
                ->setMessage('Successfully token refresh!')
                ->setData($data_refresh_token)
                ->response();
        } catch (SystemDefaultException $exception) {
            return $exception->response();
        }
    }
}
