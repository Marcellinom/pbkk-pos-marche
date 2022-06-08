<?php

namespace App\Modules\Inventory\Core\Application\Service\AddItem;

use Illuminate\Http\UploadedFile;

class AddItemRequest
{
    private string $name;
    private float $price;
    private float $quantity;
    private string $unit;
    private float $length;
    private float $width;
    private float $height;
    private float $weight;
    private string $inventory_id;
    private UploadedFile $photo;

    /**
     * @param string $name
     * @param float $price
     * @param float $quantity
     * @param string $unit
     * @param float $length
     * @param float $width
     * @param float $height
     * @param float $weight
     * @param string $inventory_id
     * @param UploadedFile $photo
     */
    public function __construct(string $name, float $price, float $quantity, string $unit, float $length, float $width, float $height, float $weight, string $inventory_id, UploadedFile $photo)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->unit = $unit;
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->weight = $weight;
        $this->inventory_id = $inventory_id;
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
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

    /**
     * @return string
     */
    public function getInventoryId(): string
    {
        return $this->inventory_id;
    }

    /**
     * @return UploadedFile
     */
    public function getPhoto(): UploadedFile
    {
        return $this->photo;
    }
}
