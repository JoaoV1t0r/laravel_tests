<?php

namespace App\Domains\Auth\Services\Concrete;

use App\Domains\Auth\Services\Abstract\IAuthLoginService;
use App\Exceptions\HttpBadRequest;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class AuthLoginService implements IAuthLoginService
{
    private string $token;
    private AuthLoginRequest $request;
    private null|Model $user;


    /**
     * @throws HttpBadRequest
     */
    public function login(AuthLoginRequest $request): array
    {
        $this->request = $request;
        $this->setUser();
        $this->checkUser();
        $this->generateToken();
        $this->validToken();
        return $this->getDataLogin();
    }

    private function setUser(): void
    {
        $this->user = User::query()
            ->where('email', $this->request->email)
            ->whereNotNull('email_verified_at')
            ->where('is_active', true)
            ->first();
    }

    /**
     * @throws HttpBadRequest
     */
    private function checkUser()
    {
        if (!isset($this->user)) {
            throw new HttpBadRequest("Credentials are invalid");
        }
    }

    private function generateToken()
    {
        $this->token = auth()->attempt($this->request->all());
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

    private function getDataLogin(): array
    {
        return [
            'access_token' => $this->token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}
