<?php

namespace App\Modules\Business\Core\Domain\Repository;

use App\Modules\Business\Core\Domain\Model\Outlet\Outlet;
use App\Modules\Sales\Core\Domain\Model\Outlet\OutletId;

interface IOutletRepository
{
    public function find(OutletId $id): ?Outlet;

    public function persist(Outlet $outlet): void;

    public function softDelete(Outlet $outlet): void;
}
