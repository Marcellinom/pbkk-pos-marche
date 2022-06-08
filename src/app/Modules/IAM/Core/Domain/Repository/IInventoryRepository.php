<?php

namespace App\Modules\IAM\Core\Domain\Repository;

use App\Modules\IAM\Core\Domain\Model\Inventory\Inventory;
use App\Modules\IAM\Core\Domain\Model\Inventory\InventoryId;

interface IInventoryRepository
{
    public function find(InventoryId $inventory_id): ?Inventory;

    public function persist(Inventory $inventory): void;

    public function softDelete(Inventory $inventory): void;
}
