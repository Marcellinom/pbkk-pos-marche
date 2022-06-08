<?php

namespace App\Modules\Inventory\Core\Domain\Model\Business;

class Business
{
    private BusinessId $id;
    private bool $soft_deleted;

    /**
     * @param BusinessId $id
     * @param bool $soft_deleted
     */
    public function __construct(BusinessId $id, bool $soft_deleted)
    {
        $this->id = $id;
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
     * @return bool
     */
    public function isSoftDeleted(): bool
    {
        return $this->soft_deleted;
    }
}
