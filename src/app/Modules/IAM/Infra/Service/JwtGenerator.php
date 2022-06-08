<?php

namespace App\Modules\IAM\Infra\Service;

use App\Exceptions\ExpectedException;
use App\Modules\IAM\Core\Domain\Model\User\UserType;
use App\Modules\IAM\Core\Domain\Service\IJwtGenerator;
use App\Modules\Shared\Model\Account;
use App\Modules\Shared\Model\RoleAccount\BusinessAccount;
use App\Modules\Shared\Model\RoleAccount\MitraAccount;
use App\Modules\Shared\Model\RoleAccount\StaffAccount;
use Firebase\JWT\JWT;

class JwtGenerator implements IJwtGenerator
{

    public function generate(Account $account): string
    {
        switch (1) {
            case $account instanceof BusinessAccount:
                $jwt = JWT::encode([
                    'user_id' => $account->getUserId(),
                    'business_id' => $account->getRoleId(),
                    'role' => UserType::BUSINESS_OWNER
                ], config('app.key'));
                break;
            case $account instanceof MitraAccount:
                $jwt = JWT::encode([
                    'user_id' => $account->getUserId(),
                    'mitra_id' => $account->getRoleId(),
                    'role' => UserType::MITRA
                ], config('app.key'));
                break;
            case $account instanceof StaffAccount:
                $jwt = JWT::encode([
                    'user_id' => $account->getUserId(),
                    'staff_id' => $account->getRoleId(),
                    'role' => UserType::STAFF
                ], config('app.key'));
                break;
            default:
                throw new ExpectedException("Invalid account type", 1025);
        }
        return $jwt;
    }
}
