<?php

namespace App\Modules\Inventory\Core\Domain\Model\Item;

class Dimension
{
    private float $length;
    private float $width;
    private float $height;
    private float $weight;

    /**
     * @param float $length
     * @param float $width
     * @param float $height
     * @param float $weight
     */
    public function __construct(float $length, float $width, float $height, float $weight)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->weight = $weight;
    }

    public function getVolume(): float
    {
        return $this->length * $this->width * $this->height;
    }

    public function getWeightkg(): float
    {
        return $this->weight / 1000;
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }
}
