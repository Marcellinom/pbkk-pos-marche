<?php

namespace App\Modules\Inventory;

use App\Modules\Shared\Handler\MessageProcessor;
use Illuminate\Support\Facades\Log;

class MessagingTestInventory extends MessageProcessor
{
    public function handle(): void
    {
        $this->process($this->getMessage()->getContent());
    }

    private function process($data): void
    {
        Log::info("message for inventory from business", $data);
    }
}
