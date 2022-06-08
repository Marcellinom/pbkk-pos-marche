<?php

namespace App\Modules\Inventory\Core\Domain\Model\Item;

use App\Modules\Inventory\Core\Domain\Model\Inventory\InventoryId;
use App\Modules\Shared\Model\ItemUnitData;

class Item
{
    private ItemId $id;
    private SkuId $sku_id;
    private InventoryId $inventory_id;
    private string $name;
    private ItemUnitData $unit_data;
    private Dimension $dimension;
    private string $photo_url;

    /**
     * @param ItemId $id
     * @param SkuId $sku_id
     * @param InventoryId $inventory_id
     * @param string $name
     * @param ItemUnitData $amount
     * @param Dimension $dimension
     * @param string $photo_url
     */
    public function __construct(ItemId $id, SkuId $sku_id, InventoryId $inventory_id, string $name, ItemUnitData $amount, Dimension $dimension, string $photo_url)
    {
        $this->id = $id;
        $this->sku_id = $sku_id;
        $this->inventory_id = $inventory_id;
        $this->name = $name;
        $this->unit_data = $amount;
        $this->dimension = $dimension;
        $this->photo_url = $photo_url;
    }

    /**
     * @return ItemId
     */
    public function getId(): ItemId
    {
        return $this->id;
    }

    /**
     * @return SkuId
     */
    public function getSkuId(): SkuId
    {
        return $this->sku_id;
    }

    /**
     * @return InventoryId
     */
    public function getInventoryId(): InventoryId
    {
        return $this->inventory_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return ItemUnitData
     */
    public function getUnitdata(): ItemUnitData
    {
        return $this->unit_data;
    }

    /**
     * @return Dimension
     */
    public function getDimension(): Dimension
    {
        return $this->dimension;
    }

    /**
     * @return string
     */
    public function getPhotoUrl(): string
    {
        return $this->photo_url;
    }
}
