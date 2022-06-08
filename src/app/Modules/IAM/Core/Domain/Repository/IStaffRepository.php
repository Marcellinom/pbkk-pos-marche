<?php

namespace App\Modules\IAM\Core\Domain\Repository;

use App\Modules\IAM\Core\Domain\Model\Staff\Staff;
use App\Modules\IAM\Core\Domain\Model\Staff\StaffId;

interface IStaffRepository
{
    public function find(StaffId $id): ?Staff;

    public function persist(Staff $staff): void;

    public function softDelete(Staff $staff): void;
}
