<?php

namespace App\Modules\Inventory\Core\Domain\Repository;

use App\Modules\Inventory\Core\Domain\Model\Mitra\Mitra;
use App\Modules\Inventory\Core\Domain\Model\Mitra\MitraId;

interface IMitraRepository
{
    public function find(MitraId $id): ?Mitra;

    public function persist(Mitra $mitra): void;

    public function softDelete(Mitra $mitra): void;
}
