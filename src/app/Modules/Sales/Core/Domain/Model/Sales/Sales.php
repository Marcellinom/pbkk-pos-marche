<?php

namespace App\Modules\Sales\Core\Domain\Model\Sales;

use App\Modules\Sales\Core\Domain\Model\Outlet\OutletId;
use DateTime;

class Sales
{
    private SalesId $id;
    private OutletId $outlet_id;
    private string $made_by;
    private float $amount_to_be_paid;
    private DateTime $created_at;
}
