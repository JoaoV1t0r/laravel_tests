<?php

namespace App\Http\Requests\Users;


use App\Http\Requests\Request;

/**
 * Class UserDeleteRequest
 * @package App\Http\Requests\Users\UserDeleteRequest
 * @property string $userUuid
 */
class UserDeleteRequest extends Request
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }
}
