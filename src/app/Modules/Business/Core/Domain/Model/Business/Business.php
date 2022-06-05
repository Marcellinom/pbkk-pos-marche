<?php

namespace App\Modules\Business\Core\Domain\Model\Business;

use App\Modules\Business\Core\Domain\Model\User\UserId;
use DateTime;

class Business
{
    private BusinessId $id;
    private UserId $owner_id;
    private BusinessCategory $business_category;
    private DateTime $created_at;
    private string $name;
    private bool $soft_deleted;

    /**
     * @param BusinessId $id
     * @param UserId $owner_id
     * @param BusinessCategory $business_category
     * @param DateTime $created_at
     * @param string $name
     * @param bool $soft_deleted
     */
    public function __construct(BusinessId $id, UserId $owner_id, BusinessCategory $business_category, DateTime $created_at, string $name, bool $soft_deleted)
    {
        $this->id = $id;
        $this->owner_id = $owner_id;
        $this->business_category = $business_category;
        $this->created_at = $created_at;
        $this->name = $name;
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
     * @return UserId
     */
    public function getOwnerId(): UserId
    {
        return $this->owner_id;
    }

    /**
     * @return BusinessCategory
     */
    public function getBusinessCategory(): BusinessCategory
    {
        return $this->business_category;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isSoftDeleted(): bool
    {
        return $this->soft_deleted;
    }
}
