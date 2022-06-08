<?php

namespace App\Modules\IAM\Core\Application\Service\Login;

class LoginResponse implements \JsonSerializable
{
    private string $jwt;

    /**
     * @param string $jwt
     */
    public function __construct(string $jwt)
    {
        $this->jwt = $jwt;
    }

    public function jsonSerialize(): array
    {
        return [
            "token" => $this->jwt
        ];
    }
}
