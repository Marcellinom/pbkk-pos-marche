<?php

namespace App\Modules\IAM\Core\Domain\Repository;

use App\Modules\IAM\Core\Domain\Model\Staff\Staff;
use App\Modules\IAM\Core\Domain\Model\Staff\StaffId;
use App\Modules\IAM\Core\Domain\Model\User\UserId;

interface IStaffRepository
{
    public function find(StaffId $id): ?Staff;

    public function findByUserId(UserId $id): ?Staff;

    public function persist(Staff $staff): void;

    public function softDelete(Staff $staff): void;
}
