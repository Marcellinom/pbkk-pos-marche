<?php

namespace App\Modules\Sales\Core\Domain\Model\Sales;

use App\Modules\Sales\Core\Domain\Model\Item\ItemId;

class SalesItem
{
    private ItemId $item_id;
    private float $quantity;

    /**
     * @param ItemId $item_id
     * @param float $quantity
     */
    public function __construct(ItemId $item_id, float $quantity)
    {
        $this->item_id = $item_id;
        $this->quantity = $quantity;
    }

    /**
     * @return ItemId
     */
    public function getItemId(): ItemId
    {
        return $this->item_id;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }
}
