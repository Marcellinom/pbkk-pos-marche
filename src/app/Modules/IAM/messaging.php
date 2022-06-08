<?php
namespace App\Modules\IAM;

use App\Modules\Shared\Handler\Messaging\MessageBus;

MessageBus::setChannel("iam");
