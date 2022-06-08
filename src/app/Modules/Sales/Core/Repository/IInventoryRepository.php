<?php

namespace App\Modules\Sales\Core\Repository;

use App\Modules\Sales\Core\Domain\Model\Inventory\Inventory;
use App\Modules\Sales\Core\Domain\Model\Inventory\InventoryId;

interface IInventoryRepository
{
    public function find(InventoryId $id): ?Inventory;

    public function persist(Inventory $inventory): void;

    public function softDelete(Inventory $inventory): void;
}
