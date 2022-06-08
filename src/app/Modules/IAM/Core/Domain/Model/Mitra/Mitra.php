<?php

namespace App\Modules\IAM\Core\Domain\Model\Mitra;

use App\Modules\IAM\Core\Domain\Model\Business\BusinessId;
use App\Modules\IAM\Core\Domain\Model\Inventory\InventoryId;
use App\Modules\IAM\Core\Domain\Model\User\UserId;

class Mitra
{
    private MitraId $id;
    private UserId $user_id;
    private BusinessId $business_id;
    private InventoryId $inventory_id;
    private string $location;
    private bool $soft_deleted;

    /**
     * @param MitraId $id
     * @param UserId $user_id
     * @param BusinessId $business_id
     * @param InventoryId $inventory_id
     * @param string $location
     * @param bool $soft_deleted
     */
    public function __construct(MitraId $id, UserId $user_id, BusinessId $business_id, InventoryId $inventory_id, string $location, bool $soft_deleted)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->business_id = $business_id;
        $this->inventory_id = $inventory_id;
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
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->user_id;
    }

    /**
     * @return BusinessId
     */
    public function getBusinessId(): BusinessId
    {
        return $this->business_id;
    }

    /**
     * @return InventoryId
     */
    public function getInventoryId(): InventoryId
    {
        return $this->inventory_id;
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
