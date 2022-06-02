<?php

namespace App\Domains\Users\Models;

use App\Support\Models\Model;
use JetBrains\PhpStorm\Pure;

class UserListingModel extends Model
{
    protected string $userUuid;
    protected string $dateCreateUser;
    protected string $userName;
    protected string $userEmail;
    protected bool $isActive;

    #[Pure] public static function builder(): static
    {
        return new UserListingModel();
    }

    /**
     * @return string
     */
    public function getUserUuid(): string
    {
        return $this->userUuid;
    }

    /**
     * @param string $userUuid
     */
    public function setUserUuid(string $userUuid): void
    {
        $this->userUuid = $userUuid;
    }

    /**
     * @return string
     */
    public function getDateCreateUser(): string
    {
        return $this->dateCreateUser;
    }

    /**
     * @param string $dateCreateUser
     */
    public function setDateCreateUser(string $dateCreateUser): void
    {
        $this->dateCreateUser = $dateCreateUser;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getUserEmail(): string
    {
        return $this->userEmail;
    }

    /**
     * @param string $userEmail
     */
    public function setUserEmail(string $userEmail): void
    {
        $this->userEmail = $userEmail;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }
}
