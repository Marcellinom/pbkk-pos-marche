<?php

namespace App\Modules\Sales\Core\Repository;

use App\Modules\Sales\Core\Domain\Model\Mitra\MitraId;
use App\Modules\Sales\Core\Domain\Model\Sales\Sales;
use App\Modules\Sales\Core\Domain\Model\Sales\SalesId;

interface ISalesRepository
{
    public function find(SalesId $id): ?Sales;

    /**
     * @param MitraId $mitra_id
     * @return Sales[]
     */
    public function getByMitraId(MitraId $mitra_id): array;

    public function persist(Sales $sales): void;

    public function softDelete(Sales $sales): void;
}
