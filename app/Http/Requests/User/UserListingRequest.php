<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\Request;
use App\Http\Requests\RequestBase;

/**
 * Class UserStoreRequest
 * @package App\Http\Requests\Users\UserStoreRequest
 * @property string $userEmail
 * @property string $userName
 * @property boolean $isActive
 */
class UserListingRequest extends Request
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'userEmail' => 'string',
            'userName' => 'string',
            'isActive' => 'boolean',
        ];
    }
}
