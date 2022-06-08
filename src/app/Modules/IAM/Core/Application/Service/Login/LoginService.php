<?php

namespace App\Modules\IAM\Core\Application\Service\Login;

use App\Exceptions\ExpectedException;
use App\Modules\IAM\Core\Domain\Model\User\UserType;
use App\Modules\IAM\Core\Domain\Repository\IBusinessRepository;
use App\Modules\IAM\Core\Domain\Repository\IMitraRepository;
use App\Modules\IAM\Core\Domain\Repository\IStaffRepository;
use App\Modules\IAM\Core\Domain\Repository\IUserRepository;
use App\Modules\IAM\Core\Domain\Service\IJwtGenerator;
use App\Modules\Shared\Model\RoleAccount\BusinessAccount;
use App\Modules\Shared\Model\RoleAccount\MitraAccount;
use App\Modules\Shared\Model\RoleAccount\StaffAccount;

class LoginService
{
    private IUserRepository $user_repository;
    private IBusinessRepository $business_repository;
    private IMitraRepository $mitra_repository;
    private IStaffRepository $staff_repository;
    private IJwtGenerator $jwt_generator;

    /**
     * @param IUserRepository $user_repository
     * @param IBusinessRepository $business_repository
     * @param IMitraRepository $mitra_repository
     * @param IStaffRepository $staff_repository
     * @param IJwtGenerator $jwt_generator
     */
    public function __construct(IUserRepository $user_repository, IBusinessRepository $business_repository, IMitraRepository $mitra_repository, IStaffRepository $staff_repository, IJwtGenerator $jwt_generator)
    {
        $this->user_repository = $user_repository;
        $this->business_repository = $business_repository;
        $this->mitra_repository = $mitra_repository;
        $this->staff_repository = $staff_repository;
        $this->jwt_generator = $jwt_generator;
    }

    /**
     * @throws ExpectedException
     */
    public function execute(LoginRequest $request): LoginResponse
    {
        $user = $this->user_repository->findByUsername($request->getUsername());
        if (!$user) {
            throw new ExpectedException("User not found", 1020);
        }
        if(!$user->testAgainst($request->getPassword())) {
            throw new ExpectedException("wrong password", 1021);
        }

        switch (1) {
            case $user->getType()->valueIs(UserType::BUSINESS_OWNER):
                $business = $this->business_repository->findByUserId($user->getId());
                $account = new BusinessAccount($user->getId()->toString(), $business->getId()->toString());
                break;
            case $user->getType()->valueIs(UserType::STAFF):
                $staff = $this->staff_repository->findByUserId($user->getId());
                $account = new StaffAccount($user->getId()->toString(), $staff->getId()->toString());
                break;
            case $user->getType()->valueIs(UserType::MITRA):
                $mitra = $this->mitra_repository->findByUserId($user->getId());
                $account = new MitraAccount($user->getId()->toString(), $mitra->getId()->toString());
                break;
            default:
                throw new ExpectedException("invalid user type", 1022);
        }

        return new LoginResponse($this->jwt_generator->generate($account));
    }
}
