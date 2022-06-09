<?php

namespace App\Modules\Business\Core\Domain\Model\User;

use App\Modules\IAM\Core\Domain\Model\Phone;
use DateTime;

class User
{
    private UserId $id;
    private Phone $phone;
    private DateTime $created_at;
    private string $name;

    /**
     * @param UserId $id
     * @param Phone $phone
     * @param DateTime $created_at
     * @param string $name
     */
    public function __construct(UserId $id, Phone $phone, DateTime $created_at, string $name)
    {
        $this->id = $id;
        $this->phone = $phone;
        $this->created_at = $created_at;
        $this->name = $name;
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return Phone
     */
    public function getPhone(): Phone
    {
        return $this->phone;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
