<?php

namespace App\Modules\Shared\Model\RoleAccount;

use App\Exceptions\ExpectedException;
use App\Modules\IAM\Core\Domain\Model\User\UserType;
use App\Modules\Shared\Model\Account;
use Ramsey\Uuid\Uuid;

class StaffAccount implements Account
{
    private string $user_id;
    private string $staff_id;

    /**
     * @param string $user_id
     * @param string $staff_id
     * @throws ExpectedException
     */
    public function __construct(string $user_id, string $staff_id)
    {
        if (!Uuid::isValid($staff_id) or !Uuid::isValid($user_id)) throw new ExpectedException('Invalid UUID', 1043);
        $this->staff_id = $staff_id;
        $this->user_id = $user_id;
    }

    /**
     * @return string
     * @throws ExpectedException
     */
    public function getroleId(): string
    {
        $this->failIfNotClass(self::class);
        return $this->staff_id;
    }

    /**
     * @throws ExpectedException
     */
    public function failIfNotClass(string ...$account): void
    {
        foreach ($account as $item) {
            if ($item == self::class) return;
        }
        throw new ExpectedException("Unauthorized", 1003);
    }

    public function getAccountType(): string
    {
        return UserType::STAFF;
    }

    public function getUserId(): string
    {
        return $this->user_id;
    }
}
