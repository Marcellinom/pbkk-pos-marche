<?php

namespace App\Modules\IAM\Core\Domain\Service;

use App\Modules\Shared\Model\Account;

interface IJwtGenerator
{
    public function generate(Account $account): string;
}
