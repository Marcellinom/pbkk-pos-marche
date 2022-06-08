<?php

namespace App\Modules\Inventory\Core\Domain\Model\Staff;

use App\Modules\Inventory\Core\Domain\Model\Business\BusinessId;

class Staff
{
    private StaffId $id;
    private BusinessId $business_id;
    private bool $soft_deleted;

    /**
     * @param StaffId $id
     * @param BusinessId $business_id
     * @param bool $soft_deleted
     */
    public function __construct(StaffId $id, BusinessId $business_id, bool $soft_deleted)
    {
        $this->id = $id;
        $this->business_id = $business_id;
        $this->soft_deleted = $soft_deleted;
    }

    /**
     * @return StaffId
     */
    public function getId(): StaffId
    {
        return $this->id;
    }

    /**
     * @return BusinessId
     */
    public function getBusinessId(): BusinessId
    {
        return $this->business_id;
    }

    /**
     * @return bool
     */
    public function isSoftDeleted(): bool
    {
        return $this->soft_deleted;
    }
}
