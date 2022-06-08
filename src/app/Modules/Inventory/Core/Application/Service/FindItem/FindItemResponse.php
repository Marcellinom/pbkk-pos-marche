<?php

namespace App\Modules\Inventory\Core\Application\Service\FindItem;

use JsonSerializable;

class FindItemResponse implements JsonSerializable
{
    private string $name;
    private string $sku_id;
    private string $price;
    private string $quantity;
    private string $unit;
    private string $photo_url;
    private float $length;
    private float $width;
    private float $height;
    private float $weight;

    /**
     * @param string $name
     * @param string $sku_id
     * @param string $price
     * @param string $quantity
     * @param string $unit
     * @param string $photo_url
     * @param float $length
     * @param float $width
     * @param float $height
     * @param float $weight
     */
    public function __construct(string $name, string $sku_id, string $price, string $quantity, string $unit, string $photo_url, float $length, float $width, float $height, float $weight)
    {
        $this->name = $name;
        $this->sku_id = $sku_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->unit = $unit;
        $this->photo_url = $photo_url;
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->weight = $weight;
    }

    public function jsonSerialize(): array
    {
        return [
            "name" => $this->name,
            "sku_id" => $this->sku_id,
            "price" => $this->price,
            "quantity" => $this->quantity,
            "unit" => $this->unit,
            "photo" => $this->photo_url,
            "length" => $this->length,
            "width" => $this->width,
            "height" => $this->height,
            "weight" => $this->weight,
        ];
    }
}
