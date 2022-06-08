<?php

namespace App\Modules\Sales\Core\Domain\Model\Inventory;

use App\Modules\Shared\Model\Amount;

class Inventory
{
    private InventoryId $id;
    private Amount $amount;
    private bool $soft_deleted;

    /**
     * @param InventoryId $id
     * @param Amount $amount
     * @param bool $soft_deleted
     */
    public function __construct(InventoryId $id, Amount $amount, bool $soft_deleted)
    {
        $this->id = $id;
        $this->amount = $amount;
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
     * @return Amount
     */
    public function getAmount(): Amount
    {
        return $this->amount;
    }

    /**
     * @return bool
     */
    public function isSoftDeleted(): bool
    {
        return $this->soft_deleted;
    }
}
