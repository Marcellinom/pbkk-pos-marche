<?php

namespace App\Modules\IAM\Core\Domain\Repository;

use App\Modules\IAM\Core\Domain\Model\Mitra\Mitra;
use App\Modules\IAM\Core\Domain\Model\Mitra\MitraId;
use App\Modules\IAM\Core\Domain\Model\User\UserId;

interface IMitraRepository
{
    public function find(MitraId $id): ?Mitra;

    public function findByUserId(UserId $id): ?Mitra;

    public function persist(Mitra $mitra): void;

    public function softDelete(Mitra $mitra): void;
}
