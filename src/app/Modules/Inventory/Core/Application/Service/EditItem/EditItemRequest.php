<?php

namespace App\Modules\Inventory\Core\Application\Service\EditItem;

use Illuminate\Http\UploadedFile;

class EditItemRequest
{
    private string $item_id;
    private string $name;
    private string $sku_id;
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
     * @param string $item_id
     * @param string $name
     * @param string $sku_id
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
    public function __construct(string $item_id, string $name, string $sku_id, float $price, float $quantity, string $unit, float $length, float $width, float $height, float $weight, string $inventory_id, UploadedFile $photo)
    {
        $this->item_id = $item_id;
        $this->name = $name;
        $this->sku_id = $sku_id;
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
    public function getItemId(): string
    {
        return $this->item_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSkuId(): string
    {
        return $this->sku_id;
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
