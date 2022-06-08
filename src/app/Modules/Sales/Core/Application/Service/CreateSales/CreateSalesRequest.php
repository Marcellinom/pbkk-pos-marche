<?php

namespace App\Modules\Sales\Core\Application\Service\CreateSales;

class CreateSalesRequest
{
    private string $id_barang;
    private string $quantity;

    /**
     * @param string $id_barang
     * @param string $quantity
     */
    public function __construct(string $id_barang, string $quantity)
    {
        $this->id_barang = $id_barang;
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getIdBarang(): string
    {
        return $this->id_barang;
    }

    /**
     * @return string
     */
    public function getQuantity(): string
    {
        return $this->quantity;
    }
}
