<?php

namespace App\Modules\Inventory\Core\Domain\Repository;

use App\Modules\Inventory\Core\Domain\Model\Inventory\InventoryId;
use App\Modules\Inventory\Core\Domain\Model\Item\Item;
use App\Modules\Inventory\Core\Domain\Model\Item\ItemId;

interface IItemRepository
{
    public function find(ItemId $id): ?Item;

    /**
     * @param InventoryId $inventory_id
     * @return Item[]
     */
    public function getByInventoryId(InventoryId $inventory_id): array;

    public function persist(Item $item): void;

    public function softDelete(Item $item): void;
}
