<?php

namespace App\Modules\Sales\Core\Domain\Repository;

use App\Modules\Sales\Core\Domain\Model\Business\Business;
use App\Modules\Sales\Core\Domain\Model\Business\BusinessId;

interface IBusinessRepository
{
    public function find(BusinessId $id): ?Business;

    public function persist(Business $business): void;

    public function softDelete(Business $business): void;
}
