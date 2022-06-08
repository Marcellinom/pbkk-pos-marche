<?php

namespace App\Modules\Sales\Core\Domain\Model\Item;

use App\Modules\Sales\Core\Domain\Model\Inventory\InventoryId;
use App\Modules\Shared\Model\ItemUnitData;

class Item
{
    private ItemId $id;
    private InventoryId $inventory_id;
    private ItemUnitData $unit_data;
    private bool $soft_deleted;

    /**
     * @param ItemId $id
     * @param InventoryId $inventory_id
     * @param ItemUnitData $unit_data
     * @param bool $soft_deleted
     */
    public function __construct(ItemId $id, InventoryId $inventory_id, ItemUnitData $unit_data, bool $soft_deleted)
    {
        $this->id = $id;
        $this->inventory_id = $inventory_id;
        $this->unit_data = $unit_data;
        $this->soft_deleted = $soft_deleted;
    }

    /**
     * @return ItemId
     */
    public function getId(): ItemId
    {
        return $this->id;
    }

    /**
     * @return InventoryId
     */
    public function getInventoryId(): InventoryId
    {
        return $this->inventory_id;
    }

    /**
     * @return ItemUnitData
     */
    public function getUnitData(): ItemUnitData
    {
        return $this->unit_data;
    }

    /**
     * @return bool
     */
    public function isSoftDeleted(): bool
    {
        return $this->soft_deleted;
    }
}
