<?php

namespace App\Modules\Business\Core\Domain\Model\User;

class User
{
    private UserId $id;
    private string $email;

    /**
     * @param UserId $id
     * @param string $email
     */
    public function __construct(UserId $id, string $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
