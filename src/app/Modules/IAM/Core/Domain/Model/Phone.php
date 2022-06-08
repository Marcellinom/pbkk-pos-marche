<?php

namespace App\Modules\IAM\Core\Domain\Model;

class Phone
{
    private string $number;

    /**
     * @param string $number
     */
    public function __construct(string $number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }
}
