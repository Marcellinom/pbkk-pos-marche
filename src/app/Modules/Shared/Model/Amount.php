<?php

namespace App\Modules\Shared\Model;

class Amount
{
    private float $quantity;
    private float $unit_price;
    private string $unit;

    /**
     * @param float $quantity
     * @param float $unit_price
     * @param string $unit
     */
    public function __construct(float $quantity, float $unit_price, string $unit)
    {
        $this->quantity = $quantity;
        $this->unit_price = $unit_price;
        $this->unit = $unit;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getUnitPrice(): float
    {
        return $this->unit_price;
    }

    /**
     * @return float
     */
    public function getTotalPrice(): float
    {
        return $this->unit_price * $this->quantity;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }
}
