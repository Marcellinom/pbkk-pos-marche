<?php

namespace App\Modules\IAM\Core\Domain\Model\Mitra;

use App\Modules\IAM\Core\Domain\Model\Business\BusinessId;

class Mitra
{
    private MitraId $id;
    private BusinessId $business_id;
    private string $location;
    private bool $soft_deleted;

    /**
     * @param MitraId $id
     * @param BusinessId $business_id
     * @param string $location
     * @param bool $soft_deleted
     */
    public function __construct(MitraId $id, BusinessId $business_id, string $location, bool $soft_deleted)
    {
        $this->id = $id;
        $this->business_id = $business_id;
        $this->location = $location;
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
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return bool
     */
    public function isSoftDeleted(): bool
    {
        return $this->soft_deleted;
    }
}
