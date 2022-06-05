<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ExpectedException extends Exception
{
    public function render(): Response
    {
        return response()->json([
            "success" => false,
            "message" => $this->message,
            "code" => $this->code
        ]);
    }
}
