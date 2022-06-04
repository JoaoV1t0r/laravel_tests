<?php

namespace App\Domains\Auth\Services\Concrete;

use App\Domains\Auth\Services\Abstract\IAuthLoginService;
use App\Exceptions\HttpBadRequest;
use App\Http\Requests\Auth\AuthLoginRequest;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class AuthLoginService implements IAuthLoginService
{
    private string $token;
    private AuthLoginRequest $request;

    /**
     * @throws HttpBadRequest
     */
    public function login(AuthLoginRequest $request): array
    {
        $this->request = $request;
        $this->generateToken();
        $this->validToken();
        return $this->getDataLogin();
    }

    private function getDataLogin(): array
    {
        return [
            'access_token' => $this->token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }

    /**
     * @throws HttpBadRequest
     */
    private function validToken()
    {
        if (!$this->token) {
            throw new HttpBadRequest("Error Authenticated!");
        }
    }

    private function generateToken()
    {
        $this->token = auth()->attempt($this->request->all());
    }
}
