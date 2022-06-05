<?php

use App\Modules\Sales\MessagingTestSales;
use App\Modules\Shared\Handler\MessageBus;

MessageBus::setChannel("sales");

MessageBus::registerListener("business", "BusinessCreated", MessagingTestSales::class);
