<?php

namespace App\Modules\Business\Core\Domain\Model\Mitra;

use App\Modules\Business\Core\Domain\Model\Business\BusinessId;
use App\Modules\Business\Core\Domain\Model\User\UserId;

class Mitra
{
    private MitraId $id;
    private UserId $user_id;
    private BusinessId $business_id;
    private string $name;
    private string $location;
    private bool $soft_deleted;

    /**
     * @param MitraId $id
     * @param UserId $user_id
     * @param BusinessId $business_id
     * @param string $name
     * @param string $location
     * @param bool $soft_deleted
     */
    public function __construct(MitraId $id, UserId $user_id, BusinessId $business_id, string $name, string $location, bool $soft_deleted)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->business_id = $business_id;
        $this->name = $name;
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
