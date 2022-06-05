<?php

namespace App\Modules\Business;

use App\Modules\Shared\Handler\MessageBus;

class MessagingTestBusiness
{
    public static function send(): void
    {
        MessageBus::broadcast("business", "BusinessCreated", [
            "id" => "abcd",
            "nama_business" => "Tesla"
        ]);
    }
}
