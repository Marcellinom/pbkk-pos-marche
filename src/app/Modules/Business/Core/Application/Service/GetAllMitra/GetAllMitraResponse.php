<?php

namespace App\Modules\Business\Core\Application\Service\GetAllMitra;

use JsonSerializable;

class GetAllMitraResponse implements JsonSerializable
{
    private string $name;
    private string $address;
    private string $phone;
    private string $created_at;

    /**
     * @param string $name
     * @param string $address
     * @param string $phone
     * @param string $created_at
     */
    public function __construct(string $name, string $address, string $phone, string $created_at)
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->created_at = $created_at;
    }

    public function jsonSerialize(): array
    {
        return [
            "name" => $this->name,
            "address" => $this->address,
            "phone" => $this->phone,
            "created_at" => $this->created_at,
        ];
    }
}
