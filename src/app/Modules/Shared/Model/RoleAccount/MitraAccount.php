<?php

namespace App\Modules\Shared\Model\RoleAccount;

use App\Exceptions\ExpectedException;
use App\Modules\IAM\Core\Domain\Model\User\UserType;
use App\Modules\Shared\Model\Account;
use Ramsey\Uuid\Uuid;

class MitraAccount implements Account
{
    private string $user_id;
    private string $mitra_id;

    /**
     * @param string $user_id
     * @param string $mitra_id
     * @throws ExpectedException
     */
    public function __construct(string $user_id, string $mitra_id)
    {
        if (!Uuid::isValid($mitra_id) || !Uuid::isValid($user_id)) throw new ExpectedException('Invalid UUID', 1043);
        $this->mitra_id = $mitra_id;
        $this->user_id = $user_id;
    }

    /**
     * @return string
     * @throws ExpectedException
     */
    public function getroleId(): string
    {
        $this->failIfNotClass(self::class);
        return $this->mitra_id;
    }

    /**
     * @throws ExpectedException
     */
    public function failIfNotClass(string ...$account): void
    {
        foreach ($account as $item) {
            if ($item == self::class) return;
        }
        throw new ExpectedException("Unauthorized", 1002);
    }

    public function getAccountType(): string
    {
        return UserType::MITRA;
    }

    public function getUserId(): string
    {
        return $this->user_id;
    }
}
