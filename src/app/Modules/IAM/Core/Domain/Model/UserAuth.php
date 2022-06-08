<?php

namespace App\Modules\IAM\Core\Domain\Model;

use Illuminate\Support\Facades\Hash;

class UserAuth
{
    public string $hashed_password;

    /**
     * @param string $password
     */
    public function __construct(string $password)
    {
        $this->hashed_password = Hash::make($password);
    }

    public function getHashedPassword(): string
    {
        return $this->hashed_password;
    }

    public function testAgainst(string $password): bool
    {
        return Hash::check($password, $this->getHashedPassword());
    }
}
