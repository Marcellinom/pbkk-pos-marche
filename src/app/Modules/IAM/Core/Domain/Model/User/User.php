<?php

namespace App\Modules\IAM\Core\Domain\Model\User;

use App\Modules\IAM\Core\Domain\Model\Phone;
use App\Modules\IAM\Core\Domain\Model\UserAuth;
use DateTime;

class User extends UserAuth
{
    private UserId $id;
    private UserType $type;
    private Phone $phone;
    private string $name;
    private string $username;
    private DateTime $created_at;
    private bool $soft_deleted;

    /**
     * @param UserId $id
     * @param UserType $type
     * @param Phone $phone
     * @param string $email
     * @param string $username
     * @param DateTime $created_at
     * @param bool $soft_deleted
     * @param string|null $password
     */
    public function __construct(UserId $id, UserType $type, Phone $phone, string $email, string $username, DateTime $created_at, bool $soft_deleted, string $password = null)
    {
        if ($password) {
            $this->givePassword($password);
        } else {
            parent::__construct($phone->getNumber());
        }
        $this->id = $id;
        $this->type = $type;
        $this->phone = $phone;
        $this->name = $email;
        $this->username = $username;
        $this->created_at = $created_at;
        $this->soft_deleted = $soft_deleted;
    }

    /**
     * @param string $password
     * @return void
     */
    public function givePassword(string $password): void
    {
        parent::__construct($password);
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return UserType
     */
    public function getType(): UserType
    {
        return $this->type;
    }

    /**
     * @return Phone
     */
    public function getPhone(): Phone
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    /**
     * @return bool
     */
    public function isSoftDeleted(): bool
    {
        return $this->soft_deleted;
    }
}
