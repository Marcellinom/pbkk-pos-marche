<?php

namespace App\Modules\Inventory\Core\Application\Service\GetAllInventory;

use JsonSerializable;

class GetAllInventoryResponse implements JsonSerializable
{
    private string $id;
    private string $name;
    private string $address;

    /**
     * @param string $id
     * @param string $name
     * @param string $address
     */
    public function __construct(string $id, string $name, string $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "address" => $this->address
        ];
    }
}
