<?php

namespace App\Modules\Shared\Handler\Jwt;

use App\Exceptions\ExpectedException;
use App\Modules\IAM\Core\Domain\Model\User\UserType;
use App\Modules\Shared\Model\Account;
use App\Modules\Shared\Model\RoleAccount\BusinessAccount;
use App\Modules\Shared\Model\RoleAccount\MitraAccount;
use App\Modules\Shared\Model\RoleAccount\StaffAccount;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\SignatureInvalidException;
use UnexpectedValueException;

class JwtDecoder
{
    /**
     * @throws ExpectedException
     */
    public static function decode(string $jwt): Account
    {
        try {
            $jwt = JWT::decode($jwt, config('app.key'), ['HS256']);
        } catch (ExpiredException $e) {
            throw new ExpectedException('JWT has expired', 902);
        } catch (SignatureInvalidException $e) {
            throw new ExpectedException('JWT signature is invalid', 903);
        } catch (UnexpectedValueException $e) {
            throw new ExpectedException('Unexpected jwt format', 907);
        }

        return match ($jwt->role) {
            UserType::MITRA => new MitraAccount($jwt->user_id, $jwt->mitra_id),
            UserType::BUSINESS_OWNER => new BusinessAccount($jwt->user_id, $jwt->business_id),
            UserType::STAFF => new StaffAccount($jwt->user_id, $jwt->staff_id),
            default => throw new ExpectedException("Invalid Account Type", 1005),
        };
    }
}
