<?php

namespace App\Modules\IAM\Core\Domain\Repository;

use App\Modules\IAM\Core\Domain\Model\User\User;
use App\Modules\IAM\Core\Domain\Model\User\UserId;

interface IUserRepository
{
    public function find(UserId $id): ?User;

    public function persist(User $user): void;

    public function softDelete(User $user): void;
}
