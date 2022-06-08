<?php

namespace App\Modules\IAM\Core\Repository;

use App\Modules\IAM\Core\Domain\Model\Business\Business;
use App\Modules\IAM\Core\Domain\Model\Business\BusinessId;

interface IBusinessRepository
{
    public function find(BusinessId $id): ?Business;

    public function persist(Business $business): void;

    public function softDelete(Business $business): void;
}
