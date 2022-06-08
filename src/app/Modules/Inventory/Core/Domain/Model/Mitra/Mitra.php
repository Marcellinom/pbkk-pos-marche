<?php

namespace App\Modules\Inventory\Core\Domain\Model\Mitra;

use App\Modules\Inventory\Core\Domain\Model\Business\BusinessId;
use App\Modules\Inventory\Core\Domain\Model\Inventory\InventoryId;

class Mitra
{
    private MitraId $id;
    private BusinessId $business_id;
    private InventoryId $inventory_id;
    private bool $soft_deleted;

    /**
     * @param MitraId $id
     * @param BusinessId $business_id
     * @param InventoryId $inventory_id
     * @param bool $soft_deleted
     */
    public function __construct(MitraId $id, BusinessId $business_id, InventoryId $inventory_id, bool $soft_deleted)
    {
        $this->id = $id;
        $this->business_id = $business_id;
        $this->inventory_id = $inventory_id;
        $this->soft_deleted = $soft_deleted;
    }

    /**
     * @return MitraId
     */
    public function getId(): MitraId
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
     * @return InventoryId
     */
    public function getInventoryId(): InventoryId
    {
        return $this->inventory_id;
    }

    /**
     * @return bool
     */
    public function isSoftDeleted(): bool
    {
        return $this->soft_deleted;
    }
}
