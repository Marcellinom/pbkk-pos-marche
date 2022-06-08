<?php

namespace App\Modules\Sales;

use App\Modules\Shared\Handler\Messaging\MessageBus;

MessageBus::setChannel("sales");

MessageBus::registerListener("business", "BusinessCreated", MessagingTestSales::class);
