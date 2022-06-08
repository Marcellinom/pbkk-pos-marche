<?php

namespace App\Modules\IAM\Presentation\Controller;

use App\Exceptions\ExpectedException;
use App\Http\Controllers\Controller;
use App\Modules\IAM\Core\Application\Service\Login\LoginRequest;
use App\Modules\IAM\Core\Application\Service\Login\LoginService;
use App\Modules\IAM\Core\Domain\Model\User\UserId;
use App\Modules\IAM\Core\Domain\Model\User\UserType;
use App\Modules\IAM\Core\Domain\Repository\IUserRepository;
use App\Modules\Shared\Handler\Jwt\JwtDecoder;
use App\Modules\Shared\Model\RoleAccount\BusinessAccount;
use App\Modules\Shared\Model\RoleAccount\MitraAccount;
use App\Modules\Shared\Model\RoleAccount\StaffAccount;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @throws ExpectedException
     */
    public function login(Request $request, LoginService $service): JsonResponse
    {
        return $this->successWithData(
            $service->execute(new LoginRequest($request->input('username'), $request->input('password')))
        );
    }

    /**
     * @throws ExpectedException
     */
    public function me(Request $request): JsonResponse
    {
        $account = JwtDecoder::decode($request->header('token'));

        switch (1) {
            case $account instanceof BusinessAccount:
                $tipe = UserType::BUSINESS_OWNER;
                break;
            case $account instanceof MitraAccount:
                $tipe = UserType::MITRA;
                break;
            case $account instanceof StaffAccount:
                $tipe = UserType::STAFF;
                break;
            default:
                throw new ExpectedException("invalid user type", 1023);
        }
        /** @var IUserRepository $user_repo */
        $user_repo = resolve(IUserRepository::class);
        $user = $user_repo->find(new UserId($account->getUserId()));
        return $this->successWithData([
            "nama" => $user->getName(),
            "tipe" => $tipe
        ]);
    }
}
