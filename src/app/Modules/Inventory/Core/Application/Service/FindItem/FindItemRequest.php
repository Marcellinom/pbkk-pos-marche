<?php

namespace App\Modules\Inventory\Core\Application\Service\FindItem;

class FindItemRequest
{
    private string $item_id;

    /**
     * @param string $item_id
     */
    public function __construct(string $item_id)
    {
        $this->item_id = $item_id;
    }

    /**
     * @return string
     */
    public function getItemId(): string
    {
        return $this->item_id;
    }
}
