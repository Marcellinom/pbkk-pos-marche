<?php

namespace App\Modules\Sales\Core\Domain\Model\Inventory;

use App\Modules\Sales\Core\Domain\Model\Business\BusinessId;
use App\Modules\Shared\Model\ItemUnitData;

class Inventory
{
    private InventoryId $id;
    private BusinessId $business_id;
    private bool $soft_deleted;

    /**
     * @param InventoryId $id
     * @param BusinessId $business_id
     * @param bool $soft_deleted
     */
    public function __construct(InventoryId $id, BusinessId $business_id, bool $soft_deleted)
    {
        $this->id = $id;
        $this->business_id = $business_id;
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
     * @return bool
     */
    public function isSoftDeleted(): bool
    {
        return $this->soft_deleted;
    }
}
