<?php

namespace App\Modules\Sales\Core\Application\Service\GetAllSales;

use DateTime;
use JsonSerializable;

class GetAllSalesResponse implements JsonSerializable
{
    private string $name;
    private DateTime $created_at;
    private float $paid_amount;

    /**
     * @param string $name
     * @param DateTime $created_at
     * @param float $paid_amount
     */
    public function __construct(string $name, DateTime $created_at, float $paid_amount)
    {
        $this->name = $name;
        $this->created_at = $created_at;
        $this->paid_amount = $paid_amount;
    }

    public function jsonSerialize(): array
    {
        return [
            "name" => $this->name,
            "created_at" => $this->created_at->format("Y-M-d H:M:S"),
            "paid_amount" => $this->paid_amount
        ];
    }
}
