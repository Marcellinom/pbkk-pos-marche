<?php

namespace App\Modules\Inventory\Core\Application\Service\GetAllItem;

class GetAllItemRequest
{
    private string $id_inventory;

    /**
     * @param string $id_inventory
     */
    public function __construct(string $id_inventory)
    {
        $this->id_inventory = $id_inventory;
    }

    /**
     * @return string
     */
    public function getIdInventory(): string
    {
        return $this->id_inventory;
    }
}
