<?php

namespace App\Modules\IAM\Core\Domain\Model\Business;

class Business
{
    private BusinessId $id;
    private string $business_name;
    private bool $soft_deleted;

    /**
     * @param BusinessId $id
     * @param string $business_name
     * @param bool $soft_deleted
     */
    public function __construct(BusinessId $id, string $business_name, bool $soft_deleted)
    {
        $this->id = $id;
        $this->business_name = $business_name;
        $this->soft_deleted = $soft_deleted;
    }

    /**
     * @return BusinessId
     */
    public function getId(): BusinessId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getBusinessName(): string
    {
        return $this->business_name;
    }

    /**
     * @return bool
     */
    public function isSoftDeleted(): bool
    {
        return $this->soft_deleted;
    }
}
