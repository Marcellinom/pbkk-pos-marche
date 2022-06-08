<?php

namespace App\Modules\Shared\Model;

class ItemUnitData
{
    private float $stock;
    private float $unit_price;
    private string $unit;

    /**
     * @param float $quantity
     * @param float $unit_price
     * @param string $unit
     */
    public function __construct(float $quantity, float $unit_price, string $unit)
    {
        $this->stock = $quantity;
        $this->unit_price = $unit_price;
        $this->unit = $unit;
    }

    /**
     * @return float
     */
    public function getStock(): float
    {
        return $this->stock;
    }

    /**
     * @return float
     */
    public function getUnitPrice(): float
    {
        return $this->unit_price;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    public function getTotalPriceForQuantity(float $quantity): float
    {
        return $this->unit_price * $quantity;
    }
}
