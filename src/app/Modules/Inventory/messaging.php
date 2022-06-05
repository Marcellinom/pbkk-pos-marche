<?php
namespace App\Modules\Inventory;

use App\Modules\Shared\Handler\MessageBus;

MessageBus::setChannel("inventory");

MessageBus::registerListener("business", "BusinessCreated", MessagingTestInventory::class);
MessageBus::registerListener("business", "BusinessDeleted", MessagingTestInventoryDoNothing::class);
