<?php

namespace App\Modules\Shared\Model;

class StaffAccount extends Authentication implements Account
{
    public function getAccountUserId(): string
    {
        return $this->account_user_id;
    }
}
