<?php

namespace App\Modules\IAM\Core\Domain\Model\Mitra;

use App\Modules\IAM\Core\Domain\Model\Business\BusinessId;

class Mitra
{
    private MitraId $id;
    private BusinessId $business_id;
    private bool $soft_deleted;

    /**
     * @param MitraId $id
     * @param BusinessId $business_id
     * @param bool $soft_deleted
     */
    public function __construct(MitraId $id, BusinessId $business_id, bool $soft_deleted)
    {
        $this->id = $id;
        $this->business_id = $business_id;
        $this->soft_deleted = $soft_deleted;
    }

    /**
     * @return MitraId
     */
    public function getId(): MitraId
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
