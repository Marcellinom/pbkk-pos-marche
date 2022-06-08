<?php

namespace App\Modules\Inventory\Core\Domain\Model\Inventory;

use App\Modules\Shared\Model\Amount;

class Inventory
{
    private InventoryId $id;
    private Amount $amount;
    private string $inventory_name;
    private bool $soft_deleted;

    /**
     * @param InventoryId $id
     * @param Amount $amount
     * @param string $inventory_name
     * @param bool $soft_deleted
     */
    public function __construct(InventoryId $id, Amount $amount, string $inventory_name, bool $soft_deleted)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->inventory_name = $inventory_name;
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
     * @return string
     */
    public function getInventoryName(): string
    {
        return $this->inventory_name;
    }

    /**
     * @return bool
     */
    public function isSoftDeleted(): bool
    {
        return $this->soft_deleted;
    }
}
