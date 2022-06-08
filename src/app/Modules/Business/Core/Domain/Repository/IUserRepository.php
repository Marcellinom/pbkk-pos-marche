<?php

namespace App\Modules\Business\Core\Domain\Repository;

use App\Modules\Business\Core\Domain\Model\User\UserId;
use App\Modules\IAM\Core\Domain\Model\User\User;

interface IUserRepository
{
    public function find(UserId $id): ?User;

    public function persist(User $user): void;

    public function softDelete(User $user): void;
}
