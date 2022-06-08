<?php

namespace App\Modules\IAM\Core\Domain\Model\Staff;

use App\Modules\IAM\Core\Domain\Model\Business\BusinessId;

class Staff
{
    private StaffId $id;
    private BusinessId $business_id;
    private bool $soft_delete;

    /**
     * @param StaffId $id
     * @param BusinessId $business_id
     * @param bool $soft_delete
     */
    public function __construct(StaffId $id, BusinessId $business_id, bool $soft_delete)
    {
        $this->id = $id;
        $this->business_id = $business_id;
        $this->soft_delete = $soft_delete;
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
    public function isSoftDelete(): bool
    {
        return $this->soft_delete;
    }
}
