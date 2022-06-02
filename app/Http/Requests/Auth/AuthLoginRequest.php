<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;
use App\Http\Requests\RequestBase;

/**
 * Class AuthLoginRequest
 * @package App\Http\Requests\Auth\AuthLoginRequest
 * @property string $email
 * @property string $password
 */
class AuthLoginRequest extends Request
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'email|required',
            'password' => 'string|required'
        ];
    }
}
