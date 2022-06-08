<?php

namespace App\Modules\Business\Core\Domain\Repository;

use App\Modules\Business\Core\Domain\Model\Business\BusinessId;
use App\Modules\Business\Core\Domain\Model\Mitra\Mitra;
use App\Modules\Business\Core\Domain\Model\Mitra\MitraId;

interface IMitraRepository
{
    public function find(MitraId $id): ?Mitra;

    /**
     * @param BusinessId $business_id
     * @return Mitra[]
     */
    public function getByBusinessId(BusinessId $business_id): array;

    public function persist(Mitra $outlet): void;

    public function softDelete(Mitra $outlet): void;
}
