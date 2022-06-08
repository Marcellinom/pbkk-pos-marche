<?php

namespace App\Modules\Inventory\Core\Repository;

use App\Modules\Inventory\Core\Domain\Model\Business\Business;
use App\Modules\Inventory\Core\Domain\Model\Business\BusinessId;

interface IBusinessRepository
{
    public function find(BusinessId $id): ?Business;

    public function persist(Business $business): void;

    public function softDelete(Business $business): void;
}
