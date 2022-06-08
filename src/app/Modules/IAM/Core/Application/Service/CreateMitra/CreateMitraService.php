<?php

namespace App\Modules\IAM\Core\Application\Service\CreateMitra;

use App\Exceptions\ExpectedException;
use App\Modules\IAM\Core\Repository\IMitraRepository;
use App\Modules\IAM\Core\Repository\IUserRepository;
use App\Modules\Shared\Model\Account;
use App\Modules\Shared\Model\BusinessAccount;

class CreateMitraService
{
    private IUserRepository $user_repository;
    private IMitraRepository $mitra_repository;

    /**
     * @throws \App\Exceptions\ExpectedException
     */
    public function execute(CreateMitraRequest $request, Account $account): void
    {
        if (!$account instanceof BusinessAccount) {
            throw new ExpectedException("Unauthorized!", 1000);
        }
    }
}
