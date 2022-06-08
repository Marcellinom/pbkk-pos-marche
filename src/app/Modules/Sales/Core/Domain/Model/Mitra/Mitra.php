<?php

namespace App\Modules\Sales\Core\Domain\Model\Mitra;

use App\Modules\Sales\Core\Domain\Model\Business\BusinessId;

class Mitra
{
    private MitraId $id;
    private BusinessId $business_id;
    private string $name;
    private bool $soft_deleted;

    /**
     * @param MitraId $id
     * @param BusinessId $business_id
     * @param string $name
     * @param bool $soft_deleted
     */
    public function __construct(MitraId $id, BusinessId $business_id, string $name, bool $soft_deleted)
    {
        $this->id = $id;
        $this->business_id = $business_id;
        $this->name = $name;
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
