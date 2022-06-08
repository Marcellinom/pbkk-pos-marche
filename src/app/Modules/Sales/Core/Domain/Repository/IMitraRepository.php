<?php

namespace App\Modules\Sales\Core\Domain\Repository;

use App\Modules\Sales\Core\Domain\Model\Business\BusinessId;
use App\Modules\Sales\Core\Domain\Model\Mitra\Mitra;
use App\Modules\Sales\Core\Domain\Model\Mitra\MitraId;

interface IMitraRepository
{
    public function find(MitraId $id): ?Mitra;

    /**
     * @param BusinessId $business_id
     * @return Mitra[]
     */
    public function getByBusinessId(BusinessId $business_id): array;

    public function persist(Mitra $mitra): void;

    public function softDelete(Mitra $mitra): void;
}
