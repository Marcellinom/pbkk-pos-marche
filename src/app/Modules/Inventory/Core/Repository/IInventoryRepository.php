<?php

namespace App\Modules\Inventory\Core\Repository;

use App\Modules\Inventory\Core\Domain\Model\Business\BusinessId;
use App\Modules\Inventory\Core\Domain\Model\Inventory\Inventory;
use App\Modules\Inventory\Core\Domain\Model\Inventory\InventoryId;

interface IInventoryRepository
{
    public function find(InventoryId $id): ?Inventory;

    /**
     * @param BusinessId $business_id
     * @return Inventory[]
     */
    public function getByBusinessId(BusinessId $business_id): array;

    public function persist(Inventory $inventory): void;

    public function softDelete(Inventory $inventory): void;
}
