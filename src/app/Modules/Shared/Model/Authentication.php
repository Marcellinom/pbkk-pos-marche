<?php

namespace App\Modules\Shared\Model;

abstract class Authentication
{
    use Uuidtrait;

    protected string $account_user_id;

    /**
     * @param string $account_user_id
     */
    public function __construct(string $account_user_id)
    {
        $this->account_user_id = $account_user_id;
    }

    public function testAgainstId(string $id): bool
    {
        return $id == $this->guid;
    }
}
