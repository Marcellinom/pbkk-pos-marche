<?php

namespace App\Modules\Inventory\Core\Domain\Model\Inventory;

use App\Modules\Inventory\Core\Domain\Model\Business\BusinessId;
use App\Modules\Shared\Model\ItemUnitData;

class Inventory
{
    private InventoryId $id;
    private BusinessId $business_id;
    private string $inventory_name;
    private string $location;
    private bool $soft_deleted;

    /**
     * @param InventoryId $id
     * @param BusinessId $business_id
     * @param string $inventory_name
     * @param string $location
     * @param bool $soft_deleted
     */
    public function __construct(InventoryId $id, BusinessId $business_id, string $inventory_name, string $location, bool $soft_deleted)
    {
        $this->id = $id;
        $this->business_id = $business_id;
        $this->inventory_name = $inventory_name;
        $this->location = $location;
        $this->soft_deleted = $soft_deleted;
    }

    /**
     * @return InventoryId
     */
    public function getId(): InventoryId
    {
        return $this->id;
    }

    /**
     * @return BusinessId
     */
    public function getBusinessId(): BusinessId
    {
        return $this->business_id;
    }

    /**
     * @return string
     */
    public function getInventoryName(): string
    {
        return $this->inventory_name;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return bool
     */
    public function isSoftDeleted(): bool
    {
        return $this->soft_deleted;
    }
}
