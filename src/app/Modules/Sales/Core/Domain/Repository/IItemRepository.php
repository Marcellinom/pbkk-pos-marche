<?php

namespace App\Modules\Sales\Core\Domain\Repository;

use App\Modules\Sales\Core\Domain\Model\Inventory\InventoryId;
use App\Modules\Sales\Core\Domain\Model\Item\Item;
use App\Modules\Sales\Core\Domain\Model\Item\ItemId;

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
