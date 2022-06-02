<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\Request;

/**
 * Class UserUpdateRequest
 * @package App\Http\Requests\Users\UserUpdateRequest
 * @property string $userUuid
 * @property string $password
 * @property string $name
 */
class UserUpdateRequest extends Request
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string',
            'password' => 'string'
        ];
    }
}
