<?php

namespace App\Modules\Business\Core\Application\Service\GetAllMitra;

use App\Exceptions\ExpectedException;
use App\Modules\Business\Core\Domain\Model\Business\BusinessId;
use App\Modules\Business\Core\Domain\Repository\IMitraRepository;
use App\Modules\Business\Core\Domain\Repository\IUserRepository;
use App\Modules\Shared\Model\Account;
use App\Modules\Shared\Model\RoleAccount\BusinessAccount;

class GetAllMitraService
{
    private IMitraRepository $mitra_repository;
    private IUserRepository $user_repository;

    /**
     * @param IMitraRepository $mitra_repository
     * @param IUserRepository $user_repository
     */
    public function __construct(IMitraRepository $mitra_repository, IUserRepository $user_repository)
    {
        $this->mitra_repository = $mitra_repository;
        $this->user_repository = $user_repository;
    }

    /**
     * @throws ExpectedException
     */
    public function execute(Account $account): array
    {
        $account->failIfNotClass(BusinessAccount::class);
        $mitras = $this->mitra_repository->getByBusinessId(new BusinessId($account->getRoleId()));
        $responses = [];
        foreach ($mitras as $mitra) {
            $user = $this->user_repository->find($mitra->getUserId());
            $responses[] = new GetAllMitraResponse(
                $mitra->getName(),
                $mitra->getLocation(),
                $user->getPhone()->getNumber(),
                $user->getCreatedAt()->format("Y-M-d H:M:S")
            );
        }
        return $responses;
    }
}
