<?php

namespace App\Modules\Shared\Model;

use App\Exceptions\ExpectedException;
use Ramsey\Uuid\Uuid;

trait Uuidtrait
{
    private string $guid;

    /**
     * ConstructableUuidId constructor.
     * @param string $guid
     * @throws ExpectedException() 1043
     */
    public function __construct(string $guid)
    {
        if (Uuid::isValid($guid)) throw new ExpectedException('Invalid UUID', 1043);
        $this->guid = $guid;
    }

    public function toString(): string
    {
        return $this->guid;
    }

    /**
     * @throws ExpectedException
     */
    public static function generate(): self
    {
        return new self(Uuid::uuid4()->toString());
    }
}
