<?php

namespace App\Modules\IAM\Core\Domain\Repository;

use App\Modules\IAM\Core\Domain\Model\Business\Business;
use App\Modules\IAM\Core\Domain\Model\Business\BusinessId;
use App\Modules\IAM\Core\Domain\Model\User\UserId;

interface IBusinessRepository
{
    public function find(BusinessId $id): ?Business;

    public function findByUserId(UserId $id): ?Business;

    public function persist(Business $business): void;

    public function softDelete(Business $business): void;
}
