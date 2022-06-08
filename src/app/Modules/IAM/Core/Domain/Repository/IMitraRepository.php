<?php

namespace App\Modules\IAM\Core\Domain\Repository;

use App\Modules\IAM\Core\Domain\Model\Mitra\Mitra;
use App\Modules\IAM\Core\Domain\Model\Mitra\MitraId;

interface IMitraRepository
{
    public function find(MitraId $id): ?Mitra;

    public function persist(Mitra $mitra): void;

    public function softDelete(Mitra $mitra): void;
}
