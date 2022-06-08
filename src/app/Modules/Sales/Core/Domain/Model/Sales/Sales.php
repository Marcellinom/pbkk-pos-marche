<?php

namespace App\Modules\Sales\Core\Domain\Model\Sales;

use App\Modules\Sales\Core\Domain\Model\Mitra\MitraId;
use DateTime;

class Sales
{
    private SalesId $id;
    private MitraId $mitra_id;
    /**
     * @var SalesItem[]
     */
    private array $sales_items;
    private string $made_by;
    private float $amount_to_be_paid;
    private DateTime $created_at;

    /**
     * @param SalesId $id
     * @param MitraId $outlet_id
     * @param SalesItem[] $sales_items
     * @param string $made_by
     * @param float $amount_to_be_paid
     * @param DateTime $created_at
     */
    public function __construct(SalesId $id, MitraId $outlet_id, array $sales_items, string $made_by, float $amount_to_be_paid, DateTime $created_at)
    {
        $this->id = $id;
        $this->mitra_id = $outlet_id;
        $this->sales_items = $sales_items;
        $this->made_by = $made_by;
        $this->amount_to_be_paid = $amount_to_be_paid;
        $this->created_at = $created_at;
    }

    /**
     * @return SalesId
     */
    public function getId(): SalesId
    {
        return $this->id;
    }

    /**
     * @return MitraId
     */
    public function getMitraId(): MitraId
    {
        return $this->mitra_id;
    }

    /**
     * @return SalesItem[]
     */
    public function getSalesItems(): array
    {
        return $this->sales_items;
    }

    /**
     * @return string
     */
    public function getMadeBy(): string
    {
        return $this->made_by;
    }

    /**
     * @return float
     */
    public function getAmountToBePaid(): float
    {
        return $this->amount_to_be_paid;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }
}
