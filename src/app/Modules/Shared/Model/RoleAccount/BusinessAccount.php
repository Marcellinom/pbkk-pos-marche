<?php

namespace App\Modules\Shared\Model\RoleAccount;

use App\Exceptions\ExpectedException;
use App\Modules\IAM\Core\Domain\Model\User\UserType;
use App\Modules\Shared\Model\Account;
use Ramsey\Uuid\Uuid;

class BusinessAccount implements Account
{
    private string $user_id;
    private string $business_id;

    /**
     * @param string $user_id
     * @param string $business_id
     * @throws ExpectedException
     */
    public function __construct(string $user_id, string $business_id)
    {
        if (!Uuid::isValid($business_id)  || !Uuid::isValid($user_id)) throw new ExpectedException('Invalid UUID', 1043);
        $this->business_id = $business_id;
        $this->user_id = $user_id;
    }


    /**
     * @return string
     * @throws ExpectedException
     */
    public function getroleId(): string
    {
        $this->failIfNotClass(self::class);
        return $this->business_id;
    }

    /**
     * @throws ExpectedException
     */
    public function failIfNotClass(string ...$account): void
    {
        foreach ($account as $item) {
            if ($item == self::class) return;
        }
        throw new ExpectedException("Unauthorized", 1001);
    }

    public function getAccountType(): string
    {
        return UserType::BUSINESS_OWNER;
    }

    public function getUserId(): string
    {
        return $this->user_id;
    }
}
