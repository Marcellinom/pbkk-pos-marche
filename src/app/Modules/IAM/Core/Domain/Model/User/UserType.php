<?php

namespace App\Modules\IAM\Core\Domain\Model\User;

use App\Modules\Shared\Model\MarcheEnum;

class UserType  extends MarcheEnum
{
    public const STAFF = "Staff";
    public const BUSINESS_OWNER = "Business Owner";
}
