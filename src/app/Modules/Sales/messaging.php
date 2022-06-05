<?php

namespace App\Modules\Sales;

use App\Modules\Shared\Handler\MessageBus;

MessageBus::setChannel("sales");

MessageBus::registerListener("business", "BusinessCreated", MessagingTestSales::class);
