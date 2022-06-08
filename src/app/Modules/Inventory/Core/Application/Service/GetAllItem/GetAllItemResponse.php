<?php

namespace App\Modules\Inventory\Core\Application\Service\GetAllItem;

use JsonSerializable;

class GetAllItemResponse implements JsonSerializable
{
    private string $id;
    private string $name;
    private string $sku_id;
    private float $price;
    private float $quantity;
    private string $unit;

    /**
     * @param string $id
     * @param string $name
     * @param string $sku_id
     * @param float $price
     * @param float $quantity
     * @param string $unit
     */
    public function __construct(string $id, string $name, string $sku_id, float $price, float $quantity, string $unit)
    {
        $this->id = $id;
        $this->name = $name;
        $this->sku_id = $sku_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->unit = $unit;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "sku_id" => $this->sku_id,
            "price" => $this->price,
            "quantity" => $this->quantity,
            "unit" => $this->unit
        ];
    }
}
