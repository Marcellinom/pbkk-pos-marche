<?php

namespace App\Modules\Business;

use App\Modules\Business\Core\Application\MessageProcessor\MitraPersistedMP;
use App\Modules\Business\Core\Application\MessageProcessor\UserPersistedMP;
use App\Modules\Shared\Handler\Messaging\MessageBus;

MessageBus::setChannel("business");

MessageBus::registerListener('iam', 'MitraPersisted', MitraPersistedMP::class);
MessageBus::registerListener('iam', 'UserPersisted', UserPersistedMP::class);
