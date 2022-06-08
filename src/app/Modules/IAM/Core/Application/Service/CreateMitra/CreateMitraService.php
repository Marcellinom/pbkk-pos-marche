<?php

namespace App\Modules\IAM\Core\Application\Service\CreateMitra;

use App\Exceptions\ExpectedException;
use App\Modules\IAM\Core\Domain\Model\Business\BusinessId;
use App\Modules\IAM\Core\Domain\Model\Mitra\Mitra;
use App\Modules\IAM\Core\Domain\Model\Mitra\MitraId;
use App\Modules\IAM\Core\Domain\Model\Phone;
use App\Modules\IAM\Core\Domain\Model\User\User;
use App\Modules\IAM\Core\Domain\Model\User\UserId;
use App\Modules\IAM\Core\Domain\Model\User\UserType;
use App\Modules\IAM\Core\Domain\Repository\IMitraRepository;
use App\Modules\IAM\Core\Domain\Repository\IUserRepository;
use App\Modules\Shared\Model\Account;
use App\Modules\Shared\Model\RoleAccount\BusinessAccount;
use DateTime;

class CreateMitraService
{
    private IUserRepository $user_repository;
    private IMitraRepository $mitra_repository;

    /**
     * @param IUserRepository $user_repository
     * @param IMitraRepository $mitra_repository
     */
    public function __construct(IUserRepository $user_repository, IMitraRepository $mitra_repository)
    {
        $this->user_repository = $user_repository;
        $this->mitra_repository = $mitra_repository;
    }

    /**
     * @throws ExpectedException
     */
    public function execute(CreateMitraRequest $request, Account $account): void
    {
        $account->failIfNotClass(BusinessAccount::class);
        $user = new User(
            UserId::generate(),
            new UserType(UserType::MITRA),
            new Phone($request->getPhone()),
            $request->getEmail(),
            $request->getUsername(),
            new DateTime(),
            false,
            $request->getPassword()
        );

        $mitra = new Mitra(
            MitraId::generate(),
            new BusinessId($account->getRoleId()),
            $request->getAddress(),
            false
        );

        $this->user_repository->persist($user);
        $this->mitra_repository->persist($mitra);
    }
}
